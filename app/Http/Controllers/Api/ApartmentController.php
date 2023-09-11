<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Apartment;
use Illuminate\Http\Request;
use Carbon\Carbon;

class ApartmentController extends Controller
{
    public function all()
    {
        $apartments = Apartment::with(['services', 'sponsorships'])->where('visible', true)->get();

        $response = [
            "success" => true,
            "results" => $apartments
        ];

        return response()->json($response);
    }

    public function index()
    {
        $apartments = Apartment::with('services')->where('visible', true)->paginate(9);
        $status = $apartments ? 200 : 404;
        $response = $apartments ? ["success" => true, "results" => $apartments] : ["error" => "Something went wrong while loading apartments data"];
        return response()->json($response, $status);
    }

    public function show($id)
    {
        $apartments = Apartment::with('services')->where('visible', true)->find($id);
        $status = $apartments ? 200 : 404;
        $response = $apartments ? ["success" => true, "results" => $apartments] : ["error" => "The requested apartment does not exist or is not visible"];
        return response()->json($response, $status);
    }



    public function sponsored()
    {
        $today = Carbon::now();

        $apartments = Apartment::whereHas('sponsorships', function ($query) use ($today) {
            $query->where('start_date', '<=', $today)
                ->where('end_date', '>=', $today);
        })->where('visible', true)->get();

        $status = $apartments ? 200 : 404;
        $response = $apartments ? ["success" => true, "results" => $apartments] : ["error" => "There are no sponsored apartments right now"];

        return response()->json($response, $status);
    }
}
