<?php

namespace App\Services\User;

use App\Enums\UserRoleEnum;
use App\Http\Resources\UserResource;
use App\Notifications\ResetPasswordCodeEmail;
use App\Repositories\UserRepository;
use App\Services\Contracts\BaseService;
use App\Traits\PushNotificationHelper;

/**
 * Class UserService
 */
class UserService extends BaseService implements IUserService
{
    use PushNotificationHelper;

    /**
     * UserService constructor.
     */
    public function __construct(UserRepository $repository)
    {
        parent::__construct($repository);
    }

    public function getUserByEmail($email)
    {
        return $this->repository->getUserByEmail($email);
    }

    public function getUserByPasswordResetCode($token)
    {
        return $this->repository->getUserByPasswordResetCode($token);
    }

    public function clearFcmTokenFromOtherUsers($fcm_token)
    {
        $users = $this->repository->getByFcmToken($fcm_token);
        foreach ($users as $user) {
            $user->fcm_token = null;
            $user->save();
        }
    }

    public function loginAsCustomer($data)
    {
        $token = auth()->attempt([
            'email' => $data['email'],
            'password' => $data['password'],
        ]);

        if (! $token) {
            return null;
        }

        $user = auth()->user();

        if (! $user->hasRole(UserRoleEnum::CUSTOMER)) {
            return null;
        }

        if (isset($data['fcm_token']) && $data['fcm_token']) {
            $this->clearFcmTokenFromOtherUsers($data['fcm_token']);
            $user->fcm_token = $data['fcm_token'];
            $user->save();
        }

        $refresh_token = auth()->setTTL(env('JWT_REFRESH_TTL', 20160))->refresh();

        return [
            'user' => new UserResource($user),
            'token' => $token,
            'refresh_token' => $refresh_token,
        ];
    }

    public function loginAsAdmin($data)
    {
        $token = auth()->attempt([
            'email' => $data['email'],
            'password' => $data['password'],
        ]);

        if (! $token) {
            return null;
        }

        $user = auth()->user();

        if (! $user->hasRole(UserRoleEnum::ADMIN)) {
            return null;
        }

        if (isset($data['fcm_token']) && $data['fcm_token']) {
            $this->clearFcmTokenFromOtherUsers($data['fcm_token']);
            $user->fcm_token = $data['fcm_token'];
            $user->save();
        }

        $refresh_token = auth()->setTTL(env('JWT_REFRESH_TTL', 20160))->refresh();

        return [
            'user' => new UserResource($user),
            'token' => $token,
            'refresh_token' => $refresh_token,
        ];
    }

    public function logout()
    {
        $auth_user = auth('api')->user();
        auth('api')->logout();
        $auth_user->fcm_token = null;
        $auth_user->save();
    }

    public function refresh_token()
    {
        try {
            $user = auth()->user();
            $token = auth()->setTTL(env('JWT_TTL', 10080))->refresh();
            $refresh_token = auth()->setTTL(env('JWT_REFRESH_TTL', 20160))->refresh();

            return ['user' => new UserResource($user),  'token' => $token, 'refresh_token' => $refresh_token];
        } catch (\Exception $exception) {
            return null;
        }
    }

    public function register($data)
    {
        $user = $this->repository->create($data);
        $user->assignRole(UserRoleEnum::CUSTOMER);
        $user->customer()->create([]);
        $token = auth()->login($user);
        $refresh_token = auth()->setTTL(env('JWT_REFRESH_TTL', 20160))->refresh();

        return ['user' => new UserResource($user),  'token' => $token, 'refresh_token' => $refresh_token];
    }

    public function passwordResetRequest($email)
    {
        $user = $this->getUserByEmail($email);

        if ($user) {
            do {
                $code = sprintf('%06d', mt_rand(1, 999999));
                $temp_user = $this->getUserByPasswordResetCode($code);
            } while ($temp_user != null);

            $user->reset_password_code = $code;
            $user->save();

            try {
                $user->notify(new ResetPasswordCodeEmail($code));
            } catch (\Exception $exception) {
                return null;
            }

            return true;
        }

        return null;
    }

    public function passwordReset($reset_password_code, $password)
    {
        $user = $this->getUserByPasswordResetCode($reset_password_code);

        if ($user) {
            $user->password = $password;
            $user->reset_password_code = null;
            $user->save();

            return true;
        }

        return null;
    }
}
