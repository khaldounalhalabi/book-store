<?php

namespace App\Http\Controllers\customer;

use App\Http\Controllers\Controller;
use App\Http\Requests\MessageRequest;
use App\Models\Message;

class ContactController extends Controller
{
    public function contactPage()
    {
        return view('customer.contact');
    }

    public function send(MessageRequest $request)
    {
        $data = $request->validated();
        Message::create($data);

        return redirect()->back();
    }
}
