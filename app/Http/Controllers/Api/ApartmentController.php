<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Apartment;
use Illuminate\Http\Request;

class ApartmentController extends Controller
{
    public function index() {
        $apartments = Apartment::with('services')->paginate(9);
        $response = [
            "success" => true,
            "results" => $apartments,
            "message" => "Cannot find data"
        ];
        return response()->json($response);
    }

    public function show($id) {
        $apartments = Apartment::with('services')->find($id);
        $response = [
            "success" => true,
            "results" => $apartments,
            "message" => "Cannot find data"
        ];
        return response()->json($response);
    }
}
