<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\admin\CreateAdminRequest;
use App\Http\Requests\UserRequests\UserLoginRequest;
use App\Models\User;
use Exception;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Illuminate\Http\RedirectResponse;
use Illuminate\Routing\Redirector;
use Yajra\DataTables\Facades\DataTables;

class AdminController extends Controller
{
    public function data()
    {
        $books = User::role(['admin', 'super-admin'])->select(['id', 'first_name', 'last_name', 'email']);

        $query = DataTables::eloquent($books);
        if (auth()->user()->hasRole('super-admin')) {
            $query->addColumn('action', function ($user) {
                return "
                   <div class='d-flex'>
                        <div class='p-1'>
                            <button type='button' class='btn btn-xs btn-danger remove-item-from-table-btn w-auto h-auto m-auto'
                                    data-deleteurl ='".route('admin.books.destroy', $user->id)."' >
                                <i class='bi bi-trash3-fill'></i>
                            </button>
                        </div>
                    </div>";
            });
        }

        return $query->toJson();
    }

    public function login(UserLoginRequest $request): Factory|Application|View|Redirector|\Illuminate\Contracts\Foundation\Application|RedirectResponse
    {
        try {
            $credentials = $request->validated();

            if (! auth()->guard('web')->attempt($credentials) && (! auth()->user()->hasRole('super-admin') || ! auth()->user()->hasRole('admin'))) {
                $error = 'Invalid Credentials';

                return view('admin.login')->with('error', $error);
            } else {
                return redirect()->route('admin.index');
            }
        } catch (Exception) {
            abort(500);
        }
    }

    public function store(CreateAdminRequest $request)
    {
        if (! auth()->user()->hasRole('super-admin')) {
            abort(403);
        }
        $data = $request->validated();

        $user = User::create($data);
        $user->assignRole('admin');

        return redirect()->route('admin.admins');
    }

    public function logout()
    {
        if (! auth()->user() && ! auth()->user()->hasAnyRole(['super-admin', 'admin'])) {
            abort(403);
        }
        auth()->guard('web')->logout();

        return redirect()->route('admin.login-page');
    }
}
