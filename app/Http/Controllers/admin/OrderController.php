<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\admin\StoreOrUpdateOrderRequest;
use App\Http\Requests\OrderDeliveryDetailsRequest;
use App\Models\Book;
use App\Models\Order;
use App\Models\Shipping;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Str;
use Yajra\DataTables\Facades\DataTables;

class OrderController extends Controller
{
    public function data(): JsonResponse
    {
        $orders = Order::select(['id', 'total_price', 'order_number', 'status', 'created_at', 'shipping_cost']);

        return DataTables::eloquent($orders)
            ->addColumn('action', function ($order) {
                return "
                   <div class='d-flex'>
                        <div class='p-1'>
                            <a href='" . route('admin.order.show', $order->id) . "' class='btn btn-xs btn-info w-auto h-auto m-auto'>
                                <i class='bi bi-chevron-bar-right'></i>
                            </a>
                        </div>
                        <div class='p-1'>
                            <button type='button' class='btn btn-xs btn-danger remove-item-from-table-btn w-auto h-auto m-auto'
                                    data-deleteurl ='" . route('admin.order.delete', $order->id) . "' >
                                <i class='bi bi-trash3-fill'></i>
                            </button>
                        </div>
                    </div>";
            })
            ->toJson();
    }

    public function index(): Factory|Application|View|\Illuminate\Contracts\Foundation\Application
    {
        $orders = Order::where('status', '!=', 'rejected')->get();
        $totalPrices = $orders->sum(function ($order) {
            return $order->total_price;
        });

        $totalShipping = $orders->sum(function ($order) {
            return $order->shipping_cost;
        });

        $total = $totalPrices + $totalShipping;

        return view('admin.orders.orders-table', compact('total', 'totalShipping', 'totalPrices'));
    }

    public function create(StoreOrUpdateOrderRequest $orderRequest, OrderDeliveryDetailsRequest $deliveryDetailsRequest)
    {
        $deliveryDetails = $deliveryDetailsRequest->validated();
        $orderNumber = Str::uuid();
        $status = $orderRequest->status;
        $orderedBooksIds = $orderRequest->books;

        $totalPrice = 0;

        foreach ($orderedBooksIds as $id) {
            $book = Book::findOrFail($id);
            $book->quantity -= 1;
            $book->save();
            $totalPrice += $book->price;
        }

        if ($totalPrice >= 65) {
            $totalShippingCost = 0;
        } else {
            $shippingCostPerBook = Shipping::where('country', $deliveryDetails['country'])->first()->shipping_cost;
            $totalShippingCost = $shippingCostPerBook * count($orderedBooksIds);
        }

        Order::create([
            'total_price' => $totalPrice,
            'delivery_details' => json_encode($deliveryDetails),
            'shipping_cost' => $totalShippingCost,
            'order_number' => $orderNumber,
            'status' => $status,
            'ordered_books_ids' => json_encode($orderedBooksIds),
        ]);

        return redirect()->route('admin.orders.index');
    }

    public function show($order_id)
    {
        $order = Order::findOrFail($order_id);
        return \view('admin.orders.show', compact('order'));
    }

    public function edit($order_id)
    {
        $order = Order::findOrFail($order_id);
        return \view('admin.orders.edit', compact('order'));
    }

    public function update($order_id, StoreOrUpdateOrderRequest $orderRequest, OrderDeliveryDetailsRequest $deliveryDetails)
    {
        $orderNumber = Str::uuid();
        $status = $orderRequest->status;
        $orderedBooksIds = $orderRequest->books;

        $totalPrice = 0;

        $order = Order::findOrFail($order_id);

        foreach (json_decode($order->ordered_books_ids, true) as $book_id) {
            $book = Book::findOrFail($book_id);
            $book->quantity += 1;
            $book->save();
        }

        foreach ($orderedBooksIds as $id) {
            $book = Book::findOrFail($id);
            $totalPrice += $book->price;
            $book->quantity -= 1;
            $book->save();
        }

        if ($totalPrice >= 65) {
            $totalShippingCost = 0;
        } else {
            $shippingCostPerBook = Shipping::where('country', $deliveryDetails['country'])->first()->shipping_cost;
            $totalShippingCost = $shippingCostPerBook * count($orderedBooksIds);
        }

        $order->update([
            'total_price' => $totalPrice,
            'delivery_details' => json_encode($deliveryDetails->validated()),
            'shipping_cost' => $totalShippingCost,
            'order_number' => $orderNumber,
            'status' => $status,
            'ordered_books_ids' => json_encode($orderedBooksIds),
        ]);

        return redirect()->route('admin.orders.index');
    }

    public function delete($order_id)
    {
        $order = Order::findOrFail($order_id);
        if ($order->status == 'delivered') {
            $order->delete();
            return response()->json('success');
        }

        if ($order->book_id) {
            $book = $order->book;
            $book->quantity += 1;
            $book->save();
            $order->delete();
        } elseif ($order->ordered_books_ids) {
            $booksIds = json_decode($order->ordered_books_ids, true);
            foreach ($booksIds as $id) {
                $book = Book::findOrFail($id);
                $book->quantity += 1;
                $book->save();
            }

            $order->delete();
        }

        return response()->json('success');
    }
}
