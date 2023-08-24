<?php

namespace Database\Seeders;

use App\Models\Apartment;
use App\Models\Message;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;
use Mockery\Matcher\Type;

class MessageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Prevent Drop Table
        Schema::disableForeignKeyConstraints();
        Message::truncate();
        Schema::enableForeignKeyConstraints();

        $messages = [
            "bruno@gmail.com" => "Hello, my name is bruno contact me please" ,
            "fabri@gmail.com" => "Hi, is the apartment available for the first week of august?",
            "sonia@gmail.com" => "Good morning, is there a bus stop near your apartment?",
            "wilmer@gmail.com" => "Hi, does your apartment host dogs?"
        ];

        $apartments = Apartment::all(["id"]);

        foreach ($messages as $key => $message) {
            $newMessage = new Message();
            $newMessage->user_mail = $key;
            $newMessage->text = $message;
            $newMessage->apartment_id = $apartments->random(1, 4)->id;
            // $newMessage->apartment_id= 1;
            $newMessage->save();
        }
    }
}