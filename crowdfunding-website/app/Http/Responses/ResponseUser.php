<?php

namespace App\Http\Responses;

use App\Http\Resources\UserResource;

class ResponseUser {

    public static function getResponse($res_message, $resource)
    {
        $resource = new UserResource($resource);
        return response()->json([
            'response_code' => '00',
            'response_message' => $res_message,
            'data' => $resource
        ], 200);
    }

}


?>
