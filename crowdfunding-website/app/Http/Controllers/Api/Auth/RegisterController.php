<?php

namespace App\Http\Controllers\Api\Auth;

use App\Events\UserRegisteredEvent;
use App\Http\Controllers\Controller;
use App\Http\Requests\Api\Auth\RequestRegister;
use App\Http\Resources\UserResource;
use App\Http\Responses\ResponseUser;
use App\Notifications\UserRegisterNotofication;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Notification;

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

        event(new UserRegisteredEvent($user));

        return ResponseUser::getResponse('Please check youre email for verification !', $user);
    }
}
