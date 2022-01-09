<?php

namespace App\Http\Controllers\Api\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\Auth\RequestUpdatePassword;
use App\Http\Resources\UserResource;
use App\Http\Responses\ResponseUser;
use App\User;
use Illuminate\Http\Request;

class UpdatePasswordController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(RequestUpdatePassword $request)
    {
        $user = User::where('email', $request->email)->first();

        if (!$user) {
            return response([
                'response_code' => '01',
                'response_message' => 'Email not registered !',
            ], 404);
        }

        $user->update(['password' => bcrypt($request->password)]);

        return ResponseUser::getResponse('Your password has been updated !', $user);

    }
}
