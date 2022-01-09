<?php

namespace App\Http\Controllers\Api\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\Auth\RequestRegister;
use App\Http\Resources\UserResource;
use App\Http\Responses\ResponseUser;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(RequestRegister $request)
    {
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
        ]);

        $user->otp_code()->create([
            'otp' => random_int(100000, 999999),
            'valid_until' => Carbon::now()->addMinutes(5)
        ]);

        return ResponseUser::getResponse('Please check youre email for verification !', $user);
    }
}
