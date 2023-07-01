<?php

namespace App\Http\Controllers\customer;

use App\Http\Controllers\Controller;
use App\Http\Requests\OrderDeliveryDetailsRequest;
use App\Models\Book;
use App\Models\Cart;
use App\Models\Order;
use App\Models\Shipping;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use InvalidArgumentException;
use Session;
use Srmklive\PayPal\Services\PayPal as PayPalClient;
use Throwable;

class OrderController extends Controller
{
    /**
     * @throws Throwable
     */
    public function order(OrderDeliveryDetailsRequest $request, $book_id = null)
    {
        $user = auth()->user();

        if (! $user) {
            if (! $book_id) {
                abort(404);
            }

            return $this->orderingWithoutUser($book_id, $request);
        }

        return $this->orderingWithExistUser($request, $user);
    }

    /**
     * @throws Throwable
     */
    public function orderingWithExistUser($request, User $user)
    {
        $userCart = $user->cart()->get();

        $totalPrice = 0;
        $booksIds = [];
        $shippingCost = 0;
        $deliveryDetails = $request->validated();
        $shippingInfo = Shipping::where('country', $deliveryDetails['country'])->first();

        foreach ($userCart as $item) {
            $book = $item->book;
            $totalPrice += $book->price;
            $booksIds[] = $book->id;
            $book->quantity -= 1;
            $book->save();
            $shippingCost += $shippingInfo->shipping_cost;
        }

        if ($totalPrice >= 65) {
            $shippingCost = 0;
        }

        $order = Order::create([
            'total_price' => $totalPrice,
            'shipping_cost' => $shippingCost,
            'delivery_details' => json_encode($deliveryDetails),
            'order_number' => Str::uuid(),
            'user_id' => $user->id,
            'ordered_books_ids' => json_encode($booksIds),
        ]);

        $paypalData = [
            'amount' => [
                'currency_code' => 'EUR',
                'value' => $totalPrice + $shippingCost,
            ],
            'description' => 'a pay for buying books from Wardibooks Store',
        ];

        $cartItemIds = $userCart->pluck('id');

        Cart::destroy($cartItemIds);

        return $this->processTransaction($paypalData, $order);
    }

    /**
     * @throws Throwable
     */
    public function orderingWithoutUser($book_id, $request)
    {
        $book = Book::findOrFail($book_id);
        $book->quantity -= 1;
        $book->save();
        $book->refresh();

        $deliveryDetails = $request->validated();

        if ($book->price >= 65) {
            $shippingCost = 0;
        } else {
            $shippingInfo = Shipping::where('country', $deliveryDetails['country'])->first();
            $shippingCost = $shippingInfo->shipping_cost;
        }

        $order = Order::create([
            'total_price' => $book->price,
            'shipping_cost' => $shippingCost,
            'delivery_details' => json_encode($deliveryDetails),
            'order_number' => Str::uuid(),
            'book_id' => $book_id,
        ]);

        $paypalData = [
            'amount' => [
                'currency_code' => 'EUR',
                'value' => $book->price + $shippingCost,
            ],
            'description' => 'a pay for buying books from Wardibooks Store',
        ];

        return $this->processTransaction($paypalData, $order);
    }

    /**
     * @throws Throwable
     */
    public function processTransaction(array $data, Order $order)
    {
        try {
            $provider = new PayPalClient;
            $provider->setApiCredentials(config('paypal'));
            $provider->getAccessToken();
            Session::put('order-'.session()->getId(), $order);
            $response = $provider->createOrder([
                'intent' => 'CAPTURE',
                'application_context' => [
                    'return_url' => route('successTransaction'),
                    'cancel_url' => route('cancelTransaction', $order->id),
                ],
                'purchase_units' => [
                    0 => $data,
                ],
            ]);
            if (isset($response['id']) && $response['id'] != null) {
                // redirect to approve href
                foreach ($response['links'] as $links) {
                    if ($links['rel'] == 'approve') {
                        return redirect()->away($links['href']);
                    }
                }

                return redirect()
                    ->route('index')
                    ->with('error', 'Something went wrong.');
            } else {
                return redirect()
                    ->route('index')
                    ->with('error', $response['message'] ?? 'Something went wrong.');
            }
        } catch (InvalidArgumentException) {
            abort(403);
        } catch (Exception) {
            abort(500);
        }
    }

    /**
     * @throws Throwable
     */
    public function successTransaction(Request $request)
    {
        $provider = new PayPalClient;
        $provider->setApiCredentials(config('paypal'));
        $provider->getAccessToken();
        $response = $provider->capturePaymentOrder($request['token']);
        if (isset($response['status']) && $response['status'] == 'COMPLETED') {
            return redirect()
                ->route('customer.email-invoice-send');
        } else {
            return redirect()
                ->route('index')
                ->with('error', $response['message'] ?? 'Something went wrong.');
        }
    }

    public function cancelTransaction($order_id)
    {
        $order = Order::findOrFail($order_id);
        if (isset($order->book_id)) {
            $book = $order->book;
            $book->quantity += 1;
            $book->save();
        } elseif ($order->ordered_books_ids) {
            $booksIds = json_decode($order->ordered_books_ids, true);
            foreach ($booksIds as $id) {
                $book = Book::findOrFail($id);
                $book->quantity += 1;
                $book->save();
            }
        } else {
            abort(500);
        }
        Order::destroy($order_id);

        return redirect()
            ->route('index')
            ->with('error', $response['message'] ?? 'You have canceled the transaction.');
    }
}
