<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class AdminController extends Controller
{
    public function data()
    {
        $books = User::role('admin')->select(['id', 'name', 'author_name', 'publisher', 'price']);

        $query = DataTables::eloquent($books);
        if (auth()->user()->hasRole('super-admin')) {
            $query->addColumn('action', function ($user) {
                return "
                   <div class='d-flex'>
                        <div class='p-1'>
                            <button type='button' class='btn btn-xs btn-danger remove-item-from-table-btn w-auto h-auto m-auto'
                                    data-deleteurl ='" . route('admin.books.destroy', $user->id) . "' >
                                <i class='bi bi-trash3-fill'></i>
                            </button>
                        </div>
                    </div>";
            });
        }
        return $query->toJson();
    }
}
