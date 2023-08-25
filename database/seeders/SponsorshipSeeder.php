<?php

namespace Database\Seeders;

use App\Models\Sponsorship;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;

class SponsorshipSeeder extends Seeder
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
        Sponsorship::truncate();
        Schema::enableForeignKeyConstraints();

        $sponsorships = config('store.sponsorships');

        foreach ($sponsorships as $sponsorship) {
            $newSponsorship = new Sponsorship();
            $newSponsorship->name = $sponsorship['name'];
            $newSponsorship->price = $sponsorship['price'];
            $newSponsorship->hours = $sponsorship['hours'];
            $newSponsorship->save();
        }
    }
}
