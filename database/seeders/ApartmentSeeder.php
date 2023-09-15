<?php

namespace Database\Seeders;

use App\Models\Apartment;
use App\Models\Service;
use App\Models\Sponsorship;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Schema;
use Faker\Generator as Faker;


class ApartmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        // Prevent Drop Table
        Schema::disableForeignKeyConstraints();
        Apartment::truncate();
        Schema::enableForeignKeyConstraints();

        $users = User::all(["id"]);
        $services = Service::all(["id"]);
        $sponsorships = Sponsorship::all(["id"]);
        $apartments = config('store.apartments');
        $imageNum = 1;
        $sponsPresence = false;

        foreach ($apartments as $apartment) {

            $apiURL = config('store.tomtomApi.apiUrl') . $apartment['address'] . '.json?key=' . env('TOMTOM_API_KEY');
            $response = Http::withOptions(['verify' => false])->get($apiURL);

            $newApartment = new Apartment();
            $newApartment->name = $apartment['name'];
            $newApartment->description = $apartment['description'];
            $newApartment->room_number = $apartment['room_number'];
            $newApartment->bed_number = $apartment['bed_number'];
            $newApartment->bathroom_number = $apartment['bathroom_number'];
            $newApartment->square_meters = $apartment['square_meters'];
            $newApartment->latitude = $response['results']['0']['position']['lat'];
            $newApartment->longitude = $response['results']['0']['position']['lon'];
            $newApartment->address = $apartment['address'];
            $newApartment->image = 'placeholder/' .  'apartment' . $imageNum . '.jpeg';
            $newApartment->price = $faker->randomFloat(2, 60, 300);
            $newApartment->visible = $apartment['visible'];
            $newApartment->user_id = 1;

            // Add Random Services
            $serviceNum = rand(8, 24);
            $apartmentServices = [];
            for ($c = 0; $c < $serviceNum; $c++) {
                $apartmentServices[] = $services->random()->id;
            }
            // Add Random Sponsorship
            $imageNum === 26 && $sponsPresence = false;
            $apartmentsponsorship = $sponsPresence ? $sponsorships->random()->id : null;

            $newApartment->save();
            $newApartment->services()->sync(array_unique($apartmentServices));
            $apartmentsponsorship && $newApartment->sponsorships()->attach($apartmentsponsorship, array(
                'start_date' => Carbon::now(),
                'end_date' => Carbon::now()->addDays(rand(1, 3))
            ));
            $imageNum++;
            $sponsPresence = !$sponsPresence;
        }
    }
}
