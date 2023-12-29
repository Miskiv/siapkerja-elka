<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Ramsey\Uuid\Uuid;

class UuidController extends Controller
{
    public function hash()
    {
        $uuid = Uuid::uuid4()->toString();

        return $uuid;
    }
}
