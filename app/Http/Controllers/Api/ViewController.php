<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\View;
use Dotenv\Validator;
use Illuminate\Http\Request;

class ViewController extends Controller
{
    public function store(Request $request)
    {
        // Validation
        $data = $request->all();
        $validator = Validator::make($data, [
            'apartment_id' => 'exists:apartments,id',
            'user_ip' => 'required|min:5|max:150',
        ]);

        // Validation Failure
        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'errors' => $validator->errors()
            ]);
        }

        // Fill & Save data on DB
        $newView = new View();
        $newView->fill($data);
        $newView->save();

        // Validation Success
        return response()->json([
            'success' => true
        ]);
    }
}
