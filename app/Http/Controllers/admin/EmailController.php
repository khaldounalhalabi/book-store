<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Message;
use Yajra\DataTables\Facades\DataTables;

class EmailController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function data(): \Illuminate\Http\JsonResponse
    {
        $messages = Message::select(['id', 'name', 'email', 'read_at', 'created_at'])
            ->orderBy('created_at', 'DESC');

        return DataTables::eloquent($messages)
            ->addColumn('action', function ($message) {
                return "
                   <div class='d-flex'>
                        <div class='p-1'>
                            <a href='".route('admin.email.show', $message->id)."' class='btn btn-xs btn-info w-auto h-auto m-auto'>
                                <i class='bi bi-chevron-bar-right'></i>
                            </a>
                        </div>
                    </div>";
            })
            ->toJson();
    }

    public function index()
    {
        return view('admin.inbox.inbox');
    }

    public function show($id)
    {
        $email = Message::find($id);
        $email->read_at = now()->format('Y-m-d');
        $email->save();

        return view('admin.inbox.show', compact('email'));
    }
}
