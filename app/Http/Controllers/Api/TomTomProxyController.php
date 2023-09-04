<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Http;

class TomTomProxyController extends Controller
{
    public function geo($location)
    {
        $url = 'https://api.tomtom.com/search/2/geocode/' . $location . '.json?key=' . env('TOMTOM_API_KEY');
        $response = Http::get($url);
        $geo = [
            'lat' => $response['results']['0']['position']['lat'],
            'lon' => $response['results']['0']['position']['lon']
        ];
        return $geo;
    }
}
