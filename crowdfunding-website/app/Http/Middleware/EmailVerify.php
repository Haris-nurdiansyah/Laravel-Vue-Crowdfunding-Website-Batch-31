<?php

namespace App\Http\Middleware;

use App\User;
use Closure;
use Illuminate\Support\Facades\Auth;

class EmailVerify
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        // if (Auth::user()->email_verified_at != null) {
        //     return $next($request);
        // }
        // return  redirect()->route('home');
        $user = User::where('email', $request->email)->first();
        if ($user) {
            if ($user->email_verified_at != null) {
                return $next($request);
            }else{
                return response([
                    'response_code' => '01',
                    'response_message' => 'Please verify your email !',
                ], 400);
            }
        }

        return response([
            'response_code' => '01',
            'response_message' => 'Unautorizedf',
        ], 400);

    }
}
