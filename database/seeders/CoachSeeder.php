<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class CoachSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();

        for ($i = 1; $i <= 40; $i++) {
            DB::table('coaches')->insert([
                'name' => 'Wasit ' . $i,
                'sport_category' => $faker->numberBetween(1, 8), // Random ID for sport_category between 1-8
                'age' => $faker->numberBetween(25, 60), // Random age between 25 and 60
                'address' => $faker->address,
                'whatsapp' => $faker->phoneNumber,
                'instagram' => 'https://instagram.com/' . $faker->userName,
                'description' => $faker->sentence(10), // Random description
                'photo' => null, // Kolom photo dibiarkan null
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
