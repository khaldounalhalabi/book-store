<?php

namespace App\Http\Controllers\customer;

use App\Http\Controllers\Controller;
use App\Mail\InvoiceMail;
use App\Models\Book;
use Illuminate\Support\Facades\Mail;
use Session;

class SendInvoiceEmail extends Controller
{
    public function send()
    {
        if (! Session::has('order-'.session()->getId())) {
            abort(500);
        } else {
            $order = Session::get('order-'.session()->getId());
            $shippingCost = $order->shipping_cost;
            $orderNumber = $order->order_number;
            $totalPrice = $order->total_price;
            $deliveryDetails = json_decode($order->delivery_details, true);
            $booksIds = $order->ordered_books_ids ? json_decode($order->ordered_books_ids, true) : null;

            $books = [];

            if (isset($booksIds)) {
                foreach ($booksIds as $id) {
                    $book = Book::find($id);
                    $books[] = $book;
                }
            } else {
                $books[] = $order->book;
            }

            Mail::to($deliveryDetails['email'])->send(new InvoiceMail($shippingCost, $books, $orderNumber, $totalPrice, $deliveryDetails));
            Session::remove('order-'.session()->getId());

            return redirect()->route('index')->with('success', 'Transaction complete.');
        }
    }
}
