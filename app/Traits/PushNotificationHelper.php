<?php

namespace App\Traits;

use App\Models\User;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Notification;

trait PushNotificationHelper
{
    /**
     * This function send to every user has fcm token
     *
     * @param $notification
     * @param  array  $data
     */
    public function sendToAllUsers($notification, array $data)
    {
        try {
            $users = User::whereNotNull('fcm_token')->get();
            Notification::send($users, new $notification($data));
        } catch (\Exception $exception) {
            Log::info('ERROR SENDING FCM');
            Log::info($exception->getMessage());
        }
    }

    /**
     * send to many users
     *
     * @param $notification
     * @param  array  $data
     * @param  array  $users_ids
     */
    public function sendToManyUsers($notification, array $data, array $users_ids)
    {
        try {
            $users = User::whereNotNull('fcm_token')->whereIn('user_id', $users_ids)->get();
            Notification::send($users, new $notification($data));
        } catch (\Exception $exception) {
            Log::info('ERROR SENDING FCM');
            Log::info($exception->getMessage());
        }
    }

    /**
     * This function send to every user has role Player
     *
     * @param $notification
     * @param  array  $data
     * @param $user
     */
    public function sendSingleFcm($notification, array $data, User $user)
    {
        if ($user->fcm_token) {
            try {
                Notification::send($user, new $notification($data));
            } catch (\Exception $exception) {
                Log::info('ERROR SENDING FCM');
                Log::info($exception->getMessage());
            }
        }
    }
}
