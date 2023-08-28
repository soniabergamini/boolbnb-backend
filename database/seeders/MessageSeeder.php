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

        $messages = config('store.messages');
        $apartments = Apartment::all(["id"]);

        foreach ($messages as $key => $message) {
            $newMessage = new Message();
            $newMessage->user_mail = $key;
            $newMessage->text = $message;
            $newMessage->apartment_id = $apartments->random()->id;
            $newMessage->save();
        }
    }
}
