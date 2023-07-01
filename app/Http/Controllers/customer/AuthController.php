<?php

namespace App\Http\Controllers\customer;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserRequests\EditUserDataRequest;
use App\Http\Requests\UserRequests\UserLoginRequest;
use App\Http\Requests\UserRequests\UserRegisterRequest;
use App\Models\Address;
use App\Models\User;
use Exception;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Illuminate\Http\RedirectResponse;
use Illuminate\Routing\Redirector;

class AuthController extends Controller
{
    public function login(UserLoginRequest $request): Factory|Application|View|Redirector|\Illuminate\Contracts\Foundation\Application|RedirectResponse
    {
        try {
            $credentials = $request->validated();

            if (! auth()->guard('web')->attempt($credentials)) {
                $error = 'Invalid Credentials';

                return view('customer.login')->with('error', $error);
            } else {
                if (auth()->user()->hasAnyRole(['super-admin', 'admin'])) {
                    auth()->logout();

                    return redirect()->back()->with('message', 'Process Cannot Be done');
                }

                return redirect('/');
            }
        } catch (Exception) {
            abort(500);
        }
    }

    public function register(UserRegisterRequest $request): Factory|Application|View|RedirectResponse|\Illuminate\Contracts\Foundation\Application
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

            $user->assignRole('customer');

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

            return redirect()->route('customer.userDetails');
        } catch (Exception) {
            abort(500);
        }
    }

    public function userDetails(): Factory|Application|View|\Illuminate\Contracts\Foundation\Application
    {
        $user = auth()->user();

        return view('customer.userDetails', compact('user'));
    }

    public function editUserDetails(EditUserDataRequest $request): Factory|Application|View|RedirectResponse|\Illuminate\Contracts\Foundation\Application
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

        } catch (Exception) {
            abort(500);
        }
    }

    public function logout(): RedirectResponse
    {
        if (! auth()->guard('web')->user()) {
            return redirect()->route('index');
        }

        auth()->guard('web')->logout();

        return redirect()->route('index');
    }
}
