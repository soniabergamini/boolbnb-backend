<?php

namespace Database\Seeders;

use App\Models\Apartment;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;

class ApartmentSeeder extends Seeder
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
        Apartment::truncate();
        Schema::enableForeignKeyConstraints();

        $users = User::all(["id"]);

        $apartments = [
            [
                'name' => 'La tana',
                'room_number' => 4,
                'bed_number' => 3,
                'bathroom_number' => 1,
                'square_meters' => 100,
                'latitude' => 41.967623490519905,
                'longitude' => 12.743934821499842,
                'address' => 'Via Roma',
                'image' => 'apartment1',
                'visible' => true
            ],
            [
                'name' => 'Il ponte azzurro',
                'room_number' => 5,
                'bed_number' => 3,
                'bathroom_number' => 2,
                'square_meters' => 200,
                'latitude' => 41.959310774356474,
                'longitude' => 12.750801276147907,
                'address' => 'Viale della Repubblica',
                'image' => 'apartment2',
                'visible' => false
            ],
            [
                'name' => 'Il sole sorgente',
                'room_number' => 8,
                'bed_number' => 5,
                'bathroom_number' => 3,
                'square_meters' => 300,
                'latitude' => 41.97096902436032,
                'longitude' => 12.784646101153111,
                'address' => 'Via Venezia',
                'image' => 'apartment3',
                'visible' => true
            ],
            [
                'name' => 'Villa Luxury',
                'room_number' => 10,
                'bed_number' => 5,
                'bathroom_number' => 3,
                'square_meters' => 400,
                'latitude' => 41.57423442581285,
                'longitude' => 12.51246734975687,
                'address' => 'Via delle bandiere',
                'image' => 'apartment4',
                'visible' => true
            ]
        ];


        foreach ($apartments as $apartment) {

            $newApartment = new Apartment();
            $newApartment->name = $apartment['name'];
            $newApartment->room_number = $apartment['room_number'];
            $newApartment->bed_number = $apartment['bed_number'];
            $newApartment->bathroom_number = $apartment['bathroom_number'];
            $newApartment->square_meters = $apartment['square_meters'];
            $newApartment->latitude = $apartment['latitude'];
            $newApartment->longitude = $apartment['longitude'];
            $newApartment->address = $apartment['address'];
            $newApartment->image = 'placeholder/' . $apartment['image'];
            $newApartment->visible = $apartment['visible'];
            $newApartment->user_id = 1;
            $newApartment->save();
        }
    }
}
