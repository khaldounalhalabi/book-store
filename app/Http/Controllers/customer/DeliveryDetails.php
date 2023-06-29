<?php

namespace App\Http\Controllers\customer;

use App\Http\Controllers\Controller;
use App\Models\Book;

class DeliveryDetails extends Controller
{
    public function deliveryDetailsPage($book_id = null)
    {
        if (auth()->user()) {
            return view('customer.delivery-details')->with(['user' => auth()->user()]);
        } elseif (isset($book_id)) {
            $book = Book::findOrFail($book_id);

            return view('customer.delivery-details', compact('book'));
        } else {
            abort(404);
        }
    }
}
