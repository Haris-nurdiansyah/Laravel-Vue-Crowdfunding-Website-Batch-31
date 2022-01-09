<?php

namespace App\Http\Controllers\Api\Auth;

use App\Http\Controllers\Controller;
use App\Http\Resources\UserResource;
use App\Http\Responses\ResponseUser;
use App\OtpCode;
use Carbon\Carbon;
use Illuminate\Http\Request;

class VerificationController extends Controller
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
            'otp' => 'required',
        ]);

        if (!$otp = OtpCode::where('otp', $request->otp)->first()) {
            return response([
                'response_code' => '01',
                'response_message' => 'OTP not found',
            ], 404);
        }

        $now = Carbon::now();

        if ($now > $otp->valid_until) {
            return response([
                'response_code' => '01',
                'response_message' => 'OTP has expired',
            ], 400);
        }

        $user = $otp->user;
        $user->email_verified_at = $now;
        $user->save();

        $otp->delete();

        return ResponseUser::getResponse('Your account has been successfully activated !', $user);
    }
}
