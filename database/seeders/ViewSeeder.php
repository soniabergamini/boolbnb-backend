<?php

namespace Database\Seeders;

use App\Models\Apartment;
use App\Models\View;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;
use Faker\Generator as Faker;

class ViewSeeder extends Seeder
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
        View::truncate();
        Schema::enableForeignKeyConstraints();

        $apartments = Apartment::all(["id"]);

        for($i=0; $i<4; $i++){
            $newView = new View();
            $newView->user_ip = $faker->localIpv4();
            $newView->apartment_id = 1;
            $newView->save();
        }

    }
}
