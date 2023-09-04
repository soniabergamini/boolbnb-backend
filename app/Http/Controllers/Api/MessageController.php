<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Mail\NewMessage;
use App\Models\Message;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;

class MessageController extends Controller
{
    public function store(Request $request) {

        // Validation
        $data = $request->all();
        $validator = Validator::make($data, [
                'apartment_id' => 'exists:apartments,id',
                'user_mail' => 'required|email|min:5|max:150',
                'text' => 'required'
        ]);

        // Validation Failure
        if($validator->fails()) {
            return response()->json([
                'success' => false,
                'errors' => $validator->errors()
            ]);
        }

        // Fill & Save data on DB
        $newMessage = new Message();
        $newMessage->fill($data);
        $newMessage->save();

        // Send Email
        // $newMail = new NewMessage($data);
        // Mail::to(env('MAIL_FROM_ADDRESS'))->send($newMail);

        // Validation Success
        return response()->json([
            'success' => true
        ]);
    }
}
