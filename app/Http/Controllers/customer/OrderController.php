<?php

namespace App\Http\Controllers\customer;

use App\Http\Controllers\Controller;
use App\Http\Requests\OrderRequest;
use App\Models\Book;
use App\Models\Cart;
use App\Models\Order;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Srmklive\PayPal\Services\PayPal as PayPalClient;
use Throwable;

class OrderController extends Controller
{
    /**
     * @throws Throwable
     */
    public function order(OrderRequest $request, $book_id = null)
    {
        $user = auth()->user();

        if (!$user) {
            if (!$book_id) {
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

        foreach ($userCart as $item) {
            $book = $item->book;
            $totalPrice += $book->price;
            $booksIds[] = $book->id;
        }


        $deliveryDetails = $request->validated();

        $orderNumber = Str::uuid();

        DB::beginTransaction();
        Order::create([
            'total_price' => $totalPrice,
            'delivery_details' => json_encode($deliveryDetails),
            'order_number' => $orderNumber,
            'user_id' => $user->id,
            'ordered_books_ids' => json_encode($booksIds),
        ]);

        $paypalData = [
            'amount' => [
                'currency_code' => 'EUR',
                'value' => $totalPrice
            ],
            'description' => 'a pay for buying books from Wardibooks Store',
        ];


        $cartItemIds = $userCart->pluck('id');
        Cart::destroy($cartItemIds);
        return $this->processTransaction($paypalData);
    }

    /**
     * @throws Throwable
     */
    public function orderingWithoutUser($book_id, $request)
    {
        $book = Book::findOrFail($book_id);
        $deliveryDetails = $request->validated();
        DB::beginTransaction();
        Order::create([
            'total_price' => $book->price,
            'delivery_details' => json_encode($deliveryDetails),
            'order_number' => Str::uuid(),
            'book_id' => $book_id,
        ]);

        $paypalData = [
            'amount' => [
                'currency_code' => 'EUR',
                'value' => $book->price,
            ],
            'description' => 'a pay for buying books from Wardibooks Store',
        ];

        return $this->processTransaction($paypalData);
    }


    /**
     * @throws Throwable
     */
    public function processTransaction(array $data)
    {
        try {
            $provider = new PayPalClient;
            $provider->setApiCredentials(config('paypal'));
            $paypalToken = $provider->getAccessToken();
            $response = $provider->createOrder([
                "intent" => "CAPTURE",
                "application_context" => [
                    "return_url" => route('successTransaction'),
                    "cancel_url" => route('cancelTransaction'),
                ],
                "purchase_units" => [
                    0 => $data
                ],
            ]);
            if (isset($response['id']) && $response['id'] != null) {
                // redirect to approve href
                foreach ($response['links'] as $links) {
                    if ($links['rel'] == 'approve') {
                        return redirect()->away($links['href']);
                    }
                }
                DB::rollBack();
                return redirect()
                    ->route('index')
                    ->with('error', 'Something went wrong.');
            } else {
                DB::rollBack();
                return redirect()
                    ->route('index')
                    ->with('error', $response['message'] ?? 'Something went wrong.');
            }
        } catch (\InvalidArgumentException $e) {
            abort(403);
        } catch (\Exception $e) {
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
                ->route('index')
                ->with('success', 'Transaction complete.');
        } else {
            return redirect()
                ->route('index')
                ->with('error', $response['message'] ?? 'Something went wrong.');
        }
    }

    public function cancelTransaction(Request $request)
    {
        return redirect()
            ->route('index')
            ->with('error', $response['message'] ?? 'You have canceled the transaction.');
    }
}
