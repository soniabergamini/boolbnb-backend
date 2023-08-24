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

        $sponsorships = [

            [
                'name' => 'Basic',
                'price' => 2.99,
                'hours' => 24,
            ],
            [
                'name' => 'Standard',
                'price' => 5.99,
                'hours' => 72,
            ],
            [
                'name' => 'Premium',
                'price' => 9.99,
                'hours' => 144,
            ],
        ];

        foreach ($sponsorships as $sponsorship) {
            $newSponsorship = new Sponsorship();
            $newSponsorship->name = $sponsorship['name'];
            $newSponsorship->price = $sponsorship['price'];
            $newSponsorship->hours = $sponsorship['hours'];
            $newSponsorship->save();
        }
    }
}
