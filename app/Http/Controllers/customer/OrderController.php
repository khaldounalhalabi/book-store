<?php

namespace App\Http\Controllers\customer;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\Order;
use Illuminate\Support\Str;

class OrderController extends Controller
{
    public function order()
    {
        $user = auth()->user();

        if (! $user) {
            abort(404);
        }

        $userCart = $user->cart()->get();

        $totalPrice = 0;
        $booksIds = [];

        foreach ($userCart as $item) {
            $totalPrice += $item->book->price;
            $booksIds[] = $item->book->id;
        }

        $deliveryDetails = [
            'phone_number' => $user->phone_number,
            'country_code' => $user->country_code,
            'email' => $user->email,
            'street' => $user->address->street ?? 'null',
            'house_number' => $user->address->house_number ?? 'null',
            'door_number' => $user->address->door_number ?? 'null',
            'post_code' => $user->address->post_code ?? 'null',
            'city' => $user->address->city ?? 'null',
            'country' => $user->address->country ?? 'null',
        ];

        $orderNumber = Str::uuid();

        Order::create([
            'total_price' => $totalPrice,
            'delivery_details' => json_encode($deliveryDetails),
            'order_number' => $orderNumber,
            'user_id' => $user->id,
            'ordered_books_ids' => json_encode($booksIds),
        ]);

        $cartItemIds = $userCart->pluck('id');

        Cart::destroy($cartItemIds);

        return redirect()->back();
    }
}
