<?php

namespace App\Http\Controllers\Api\Auth;

use App\Events\RegenerateOtpCodeEvent;
use App\Http\Controllers\Controller;
use App\Http\Resources\UserResource;
use App\Http\Responses\ResponseUser;
use App\Notifications\RegenerateOtpCodeNotification;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Notification;

class RegenerateOtpCode extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
        ]);

        $user = User::where('email', $request->email)->first();

        if (!$user) {
            return response([
                'response_code' => '01',
                'response_message' => 'Email not registered !'
            ], 404);
        }

        if ($user->email_verified_at) {
            return response([
                'response_code' => '01',
                'response_message' => 'Your emai has been activated !'
            ], 400);
        }

        $user->generate_otp_code();

        event(new RegenerateOtpCodeEvent($user));

        return ResponseUser::getResponse('Please check youre email for verification !', $user);

    }
}
