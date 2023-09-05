<?php

use App\Http\Controllers\Api\TomTomProxyController;
use App\Http\Controllers\Api\ApartmentController;
use App\Http\Controllers\Api\MessageController;
use App\Http\Controllers\Api\ServiceController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

// All visible apartments data + services
Route::get('/apartmentsall', [ApartmentController::class, 'all']);

// All visible apartments data, paginated + services
Route::get('/apartments', [ApartmentController::class, 'index']);

// Single visible apartment data + services
Route::get('/apartments/{id}', [ApartmentController::class, 'show']);

// Service List
Route::get('/services', [ServiceController::class, 'all']);

// Save new message from frontend user
Route::post('/contacts', [MessageController::class, 'store']);

// Allow calls to tomtom from frontend
// Route::get('/tomtom-geo/{location}', [TomTomProxyController::class, 'geo']);
