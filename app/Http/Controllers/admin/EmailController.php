<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Message;

class EmailController extends Controller
{
    public function index()
    {
        $emails = Message::orderBy('created_at', 'DESC')->paginate(10);
        return view('admin.inbox.inbox', compact('emails'));
    }

    public function show($id)
    {
        $email = Message::find($id);
        $email->read_at = now()->format('Y-m-d');
        $email->save();
        return view('admin.inbox.show', compact('email'));
    }
}
