<?php

namespace App\Http\Controllers\Api\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\Auth\RequestLogin;
use App\Http\Resources\UserResource;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(RequestLogin $request)
    {
        if (!$token = Auth::guard('api')->attempt($request->only('email', 'password'))) {
            return response([
                'response_code' => '01',
                'response_message' => 'Unautorized',
            ], 401);
        }

        $data['token'] = $token;
        $data['user'] = Auth::guard('api')->user();

        return response()->json([
            'response_code' => '00',
            'response_message' => 'Login successfully !',
            'data' => $data     
        ]);
    }
}
