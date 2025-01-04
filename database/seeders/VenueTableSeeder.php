<?php

namespace Database\Seeders;

use App\Models\Venue;
use Faker\Factory as Faker;
use Illuminate\Support\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class VenueTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();

        for ($i = 0; $i < 15; $i++) {
            Venue::create([
                'name' => $faker->company,
                'location' => $faker->city,
                'capacity' => $faker->numberBetween(1000, 50000),
                'address' => $faker->address,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]);
        }
    }    
}