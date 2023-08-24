<?php

namespace Database\Seeders;

use App\Models\Service;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;

class ServiceSeeder extends Seeder
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
        Service::truncate();
        Schema::enableForeignKeyConstraints();

        $services = [
            'Wifi',
            'Kitchen',
            'Washing machine',
            'Dryer',
            'Air conditioning',
            'Heating',
            'Dedicated workspace',
            'TV',
            'Hair dryer',
            'Iron',
            'Features',
            'Pool',
            'Hot tub',
            'Free parking',
            'EV charger',
            'Cot',
            'Gym',
            'BBQ grill',
            'Breakfast',
            'Smoking allowed',
            'Indoor fireplace',
            'Beachfront',
            'Waterfront',
            'Safety',
            'Smoke alarm',
            'Carbon monoxide alarm'
        ];

        foreach ($services as $item) {
            $newService = new Service();
            $newService->name = $item;
            $newService->save();
        }
    }
}
