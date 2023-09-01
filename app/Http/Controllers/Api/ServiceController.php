<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Service;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    public function all() {
        $services = Service::all();
        $response = [
            "success" => true,
            "results" => $services
        ];
        return response()->json($response);
    }
}
