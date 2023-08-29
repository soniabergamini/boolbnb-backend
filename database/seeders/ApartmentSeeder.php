<?php

namespace Database\Seeders;

use App\Models\Apartment;
use App\Models\Service;
use App\Models\Sponsorship;
use App\Models\User;
use Carbon\Carbon;
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
        $services = Service::all(["id"]);
        $sponsorships = Sponsorship::all(["id"]);
        $apartments = config('store.apartments');
        $imageNum = 1;

        foreach ($apartments as $apartment) {

            $newApartment = new Apartment();
            $newApartment->name = $apartment['name'];
            $newApartment->description = $apartment['description'];
            $newApartment->room_number = $apartment['room_number'];
            $newApartment->bed_number = $apartment['bed_number'];
            $newApartment->bathroom_number = $apartment['bathroom_number'];
            $newApartment->square_meters = $apartment['square_meters'];
            $newApartment->latitude = $apartment['latitude'];
            $newApartment->longitude = $apartment['longitude'];
            $newApartment->address = $apartment['address'];
            $newApartment->image = 'placeholder/' .  'apartment' . $imageNum . '.jpeg';
            $newApartment->visible = $apartment['visible'];
            $newApartment->user_id = 1;

            // Add Random Services
            $serviceNum = rand(8,18);
            $apartmentServices = [];
            for ($c=0; $c < $serviceNum; $c++) {
                $apartmentServices[] = $services->random()->id;
            }
            // Add Random Sponsorship
            $apartmentsponsorship = $sponsorships->random()->id;

            $newApartment->save();
            $newApartment->services()->sync(array_unique($apartmentServices));
            $newApartment->sponsorships()->attach($apartmentsponsorship, array(
                'start_date' => Carbon::now(),
                'end_date' => Carbon::now()->addDays(rand(1,3))
            ));
            $imageNum++;
        }
    }
}
