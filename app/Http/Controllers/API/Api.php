<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;

class Api extends Controller
{
    public function response($code, $data, $message)
    {
        $status = true;
        if ($code != 200) {
            $status = false;
        }

        $respon = [
            'status' => $status,
            'message' => $message,
            'data' => $data,
        ];

        return response()->json($respon, $code);
    }
}
