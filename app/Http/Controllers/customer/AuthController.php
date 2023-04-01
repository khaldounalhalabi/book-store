<?php

namespace App\Http\Controllers\customer;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserRequests\UserLoginRequest;

class AuthController extends Controller
{
    public function login(UserLoginRequest $request)
    {
        try {
            $credentials = $request->validated();

            if (!auth()->guard('web')->attempt($credentials)) {
                $error = 'Invalid Credentials';
                return view('login')->with('error', $error);
            } else {
                return redirect('/');
            }
        } catch (\Exception $e) {
            $data['error'] = $e->getMessage();
            return view('serverError')->with($data);
        }
    }
}
