<?php

namespace App\Http\Controllers\customer;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserRequests\EditUserDataRequest;
use App\Http\Requests\UserRequests\UserLoginRequest;
use App\Http\Requests\UserRequests\UserRegisterRequest;
use App\Models\Address;
use App\Models\User;

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

    public function register(UserRegisterRequest $request)
    {
        try {

            $userData = $request->validated();
            $user = User::create([
                'first_name' => $userData['first_name'],
                'last_name' => $userData['last_name'],
                'country_code' => $userData['country_code'],
                'phone_number' => $userData['phone_number'],
                'email' => $userData['email'],
                'password' => $userData['password'],
            ]);

            Address::create([
                'country' => $userData['country'],
                'city' => $userData['city'],
                'street' => $userData['street'],
                'house_number' => $userData['house_number'],
                'door_number' => $userData['door_number'],
                'post_code' => $userData['post_code'],
                'user_id' => $user->id,
            ]);

            auth()->guard('web')->login($user);

            return redirect()->route('userDetails');
        } catch (\Exception $e) {
            $data['error'] = $e->getMessage();
            return view('serverError')->with($data);
        }
    }

    public function userDetails()
    {
        $user = auth()->user();
        $user = $user->load('address')->toArray();
//        dd($user) ;
        return view('userDetails')->with($user);
    }

    public function editUserDetails(EditUserDataRequest $request)
    {
        try {
            $userData = $request->validated();
            $user = auth()->guard('web')->user()->update([
                'first_name' => $userData['first_name'],
                'last_name' => $userData['last_name'],
                'country_code' => $userData['country_code'],
                'phone_number' => $userData['phone_number'],
                'email' => $userData['email'],
            ]);

            Address::where('user_id' , auth()->user()->id)->update([
                'country' => $userData['country'],
                'city' => $userData['city'],
                'street' => $userData['street'],
                'house_number' => $userData['house_number'],
                'door_number' => $userData['door_number'],
                'post_code' => $userData['post_code'],
            ]);

            return redirect()->route('customer.userDetails');

        } catch (\Exception $e) {
            $data['error'] = $e->getMessage();
            return view('serverError')->with($data);
        }
    }

    public function logout()
    {
        if(!auth()->guard('web')->user()){
            return redirect()->route('index') ;
        }

        auth()->guard('web')->logout() ;
        return redirect()->route('index') ;
    }
}
