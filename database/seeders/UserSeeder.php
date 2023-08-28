<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;
use Faker\Generator as Faker;

class UserSeeder extends Seeder
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
        User::truncate();
        Schema::enableForeignKeyConstraints();

        for($i=0; $i<5; $i++){
            $newUser = new User();
            $newUser->name = ucfirst($faker->word());
            $newUser->surname = ucfirst($faker->word());
            $newUser->date_of_birth = $faker->date();
            $newUser->email = $faker->numerify('user-####') . '@test.com';
            $newUser->password = $faker->word() . $faker->shuffle('123-hello-world');
            $newUser->save();
        }
    }
}
