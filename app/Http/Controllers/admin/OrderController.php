<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\admin\StoreOrUpdateOrderRequest;
use App\Http\Requests\OrderRequest;
use App\Models\Book;
use App\Models\Order;
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
        $orders = Order::select(['id', 'total_price', 'order_number', 'status', 'created_at']);

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
                                    data-deleteurl ='" . route('admin.books.destroy', $order->id) . "' >
                                <i class='bi bi-trash3-fill'></i>
                            </button>
                        </div>
                    </div>";
            })
            ->toJson();
    }

    public function index(): Factory|Application|View|\Illuminate\Contracts\Foundation\Application
    {
        return view('admin.orders.orders-table');
    }

    public function create(StoreOrUpdateOrderRequest $orderRequest, OrderRequest $deliveryDetails)
    {
        $orderNumber = Str::uuid();
        $status = $orderRequest->status;
        $orderedBooksIds = $orderRequest->books;

        $totalPrice = 0;

        foreach ($orderedBooksIds as $id) {
            $book = Book::findOrFail($id);
            $totalPrice += $book->price;
        }

        Order::create([
            'total_price' => $totalPrice,
            'delivery_details' => json_encode($deliveryDetails->validated()),
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

    public function update($order_id, StoreOrUpdateOrderRequest $orderRequest, OrderRequest $deliveryDetails)
    {
        $orderNumber = Str::uuid();
        $status = $orderRequest->status;
        $orderedBooksIds = $orderRequest->books;

        $totalPrice = 0;

        foreach ($orderedBooksIds as $id) {
            $book = Book::findOrFail($id);
            $totalPrice += $book->price;
        }

        $order = Order::findOrFail($order_id);
        $order->update([
            'total_price' => $totalPrice,
            'delivery_details' => json_encode($deliveryDetails->validated()),
            'order_number' => $orderNumber,
            'status' => $status,
            'ordered_books_ids' => json_encode($orderedBooksIds),
        ]);

        return redirect()->route('admin.orders.index');
    }
}
