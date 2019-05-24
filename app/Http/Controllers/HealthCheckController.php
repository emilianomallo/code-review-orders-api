<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HealthCheckController extends Controller {

    const UP = 'UP';
    const DOWN = 'DOWN';
    const HTTP_OK = 200;
    const HTTP_SERVICE_UNAVAILABLE = 503;

    public function health() {
        $data = [ "status" => self::UP];
        return response()->json($data, self::HTTP_OK);
    }

}
