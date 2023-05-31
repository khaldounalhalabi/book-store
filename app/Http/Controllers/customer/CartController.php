<?php

namespace App\Http\Controllers\customer;

use App\Http\Controllers\Controller;
use App\Models\Book;
use App\Models\Cart;

class CartController extends Controller
{
    public function index()
    {
        if (! auth()->user()) {
            return redirect()->route('customer.login-page');
        }

        $user = auth()->user();
        $cart = $user->cart()->get();
        $itemsCount = $cart->count();
        $totalPrice = 0;

        foreach ($cart as $item) {
            $totalPrice += $item->book->price;
        }

        return view('customer.cart', compact(['cart', 'itemsCount', 'totalPrice']));
    }

    public function addToCart($id)
    {
        if (! auth()->user()) {
            return redirect()->route('customer.login-page');
        }

        $book = Book::findOrFail($id);
        Cart::create([
            'user_id' => auth()->user()->id,
            'book_id' => $book->id,
        ]);

        return redirect()->back();
    }

    public function remove($id)
    {
        if (! auth()->user()) {
            return redirect()->route('customer.login-page');
        }

        $cart = Cart::findOrFail($id);
        $cart->delete();

        return redirect()->back();
    }
}
