<?php

namespace App\Http\Controllers\customer;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserRequests\EditUserDataRequest;
use App\Http\Requests\UserRequests\UserLoginRequest;
use App\Http\Requests\UserRequests\UserRegisterRequest;
use App\Models\Address;
use App\Models\User;
use Exception;

class AuthController extends Controller
{
    public function login(UserLoginRequest $request): \Illuminate\Contracts\View\Factory|\Illuminate\Foundation\Application|\Illuminate\Contracts\View\View|\Illuminate\Routing\Redirector|\Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse
    {
        try {
            $credentials = $request->validated();

            if (!auth()->guard('web')->attempt($credentials)) {
                $error = 'Invalid Credentials';

                return view('customer.login')->with('error', $error);
            } else {
                return redirect('/');
            }
        } catch (Exception $e) {
            $data['error'] = $e->getMessage();

            return view('customer.serverError')->with($data);
        }
    }

    public function register(UserRegisterRequest $request): \Illuminate\Contracts\View\Factory|\Illuminate\Foundation\Application|\Illuminate\Contracts\View\View|\Illuminate\Http\RedirectResponse|\Illuminate\Contracts\Foundation\Application
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
        } catch (Exception $e) {
            $data['error'] = $e->getMessage();

            return view('customer.serverError')->with($data);
        }
    }

    public function userDetails(): \Illuminate\Contracts\View\Factory|\Illuminate\Foundation\Application|\Illuminate\Contracts\View\View|\Illuminate\Contracts\Foundation\Application
    {
        $user = auth()->user();

        return view('customer.userDetails', compact('user'));
    }

    public function editUserDetails(EditUserDataRequest $request): \Illuminate\Contracts\View\Factory|\Illuminate\Foundation\Application|\Illuminate\Contracts\View\View|\Illuminate\Http\RedirectResponse|\Illuminate\Contracts\Foundation\Application
    {
        try {
            $userData = $request->validated();
            auth()->guard('web')->user()->update([
                'first_name' => $userData['first_name'],
                'last_name' => $userData['last_name'],
                'country_code' => $userData['country_code'],
                'phone_number' => $userData['phone_number'],
                'email' => $userData['email'],
            ]);

            Address::where('user_id', auth()->user()->id)->update([
                'country' => $userData['country'],
                'city' => $userData['city'],
                'street' => $userData['street'],
                'house_number' => $userData['house_number'],
                'door_number' => $userData['door_number'],
                'post_code' => $userData['post_code'],
            ]);

            return redirect()->route('customer.userDetails');

        } catch (Exception $e) {
            abort(500);
        }
    }

    public function logout(): \Illuminate\Http\RedirectResponse
    {
        if (!auth()->guard('web')->user()) {
            return redirect()->route('index');
        }

        auth()->guard('web')->logout();

        return redirect()->route('index');
    }
}
