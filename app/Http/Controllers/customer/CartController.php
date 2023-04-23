<?php

namespace App\Http\Controllers\customer;

use App\Http\Controllers\Controller;
use App\Models\Book;
use App\Models\Cart;

class CartController extends Controller
{
    public function index()
    {
        if (!auth()->user()) {
            redirect()->route('login-page');
        }

        $user = auth()->user();
        $cart = $user->cart()->get();
        $itemsCount = $cart->count() ;
        $totalPrice = 0 ;

        foreach ($cart as $item){
//            dd($item);
            $totalPrice += $item->book->price ;
        }

        return view('cart' , compact(['cart' , 'itemsCount' , 'totalPrice']));
    }

    public function addToCart($id)
    {
        $book = Book::findOrFail($id);
        Cart::create([
            'user_id' => auth()->user()->id,
            'book_id' => $book->id,
        ]);

        return redirect()->back();
    }

    public function remove($id)
    {
        $cart = Cart::findOrFail($id) ;
        $cart->delete() ;
        return redirect()->back() ;
    }
}
