<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Illuminate\Http\JsonResponse;
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
                            <a href='" . route('admin.books.show', $order->id) . "' class='btn btn-xs btn-info w-auto h-auto m-auto'>
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
}
