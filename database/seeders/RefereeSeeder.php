<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class RefereeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $genderOptions = ['Laki-laki', 'Perempuan'];
        $licenses = ['Level 1', 'Level 2', 'Level 3', null];
        $experiences = [
            '5 tahun pengalaman', 
            '7 tahun pengalaman', 
            '10 tahun pengalaman', 
            '3 tahun pengalaman', 
            'Tidak ada pengalaman'
        ];

        for ($i = 1; $i <= 30; $i++) {
            DB::table('referees')->insert([
                'id' => Str::uuid()->toString(),
                'name' => 'Wasit ' . $i,
                'sport_category' => rand(1, 8), // Sport category IDs 1 to 8
                'gender' => $genderOptions[array_rand($genderOptions)],
                'birth_date' => now()->subYears(rand(25, 50))->format('Y-m-d'),
                'age' => rand(25, 50), // Age is optional
                'license' => $licenses[array_rand($licenses)],
                'experience' => $experiences[array_rand($experiences)],
                'photo' => 'https://via.placeholder.com/150', // Placeholder image URL
                'WhatsApp' => 'https://wa.me/' . rand(6280000000000, 6289999999999),
                'Instagram' => 'https://instagram.com/pelatih_' . $i,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
