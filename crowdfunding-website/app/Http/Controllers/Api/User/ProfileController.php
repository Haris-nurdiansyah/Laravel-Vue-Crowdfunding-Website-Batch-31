<?php

namespace App\Http\Controllers\Api\User;

use App\Http\Controllers\Controller;
use App\Http\Resources\ProfileResource;
use App\User;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        $user = User::find(auth()->guard('api')->user()->id);

        $user->foto_profile ?
            $user->foto_profile = asset('storage/users/photo-profile/' . $user->foto_profile) :
            '';

        return [
            'response_code' => '00',
            'response_message' => 'Profile data successfully displayed !',
            'data' => new ProfileResource($user)
        ];
    }
}
