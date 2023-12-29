<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class Upload extends Controller
{
    public function uploadFile($request, $data)
    {
        $file = $request->file('file');

        if (empty($file)) {
            return false;
        }

        $file->move($data['path'], $data['nama_file']);

        return true;
    }

    public function update_photo(Request $request, $data)
    {
        return $this->base64_to_jpeg($request->base64, $data);
    }

    public function base64_to_jpeg($base64_string, $data)
    {
        if (! empty($base64_string)) {
            $ifp = fopen($data['path'].'/'.$data['nama_file'], 'w+');
            $data = explode(',', $base64_string);
            fwrite($ifp, base64_decode($data[1]));
            fclose($ifp);

            return true;
        } else {
            return false;
        }
    }
}
