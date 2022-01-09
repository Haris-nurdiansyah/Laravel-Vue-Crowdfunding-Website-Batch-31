<?php

namespace App\Http\Controllers\Api\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\User\RequestUpdateProfile;
use App\Http\Resources\ProfileResource;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class UpdateProfileController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(RequestUpdateProfile $request)
    {
        $user = User::find(auth()->guard('api')->user()->id);

        if ($request->file('photo') == "") {

            $user->update(['name' => $request->name]);

        }else {

            // remove old image
            Storage::disk('local')->delete('public/users/photo-profile/' . $user->foto_profile);

            $photo = $request->file('photo');
            $photo->storeAs('public/users/photo-profile', $photo->hashName());

            // update data
            $user->update([
                'name' => $request->name,
                'foto_profile' => $photo->hashName()
            ]);

        }

        $user->foto_profile ?
            $user->foto_profile = asset('storage/users/photo-profile/' . $user->foto_profile) :
            '';

        return [
            'response_code' => '00',
            'response_message' => 'Profile has been updated !',
            'data' => new ProfileResource($user)
        ];
    }
}
