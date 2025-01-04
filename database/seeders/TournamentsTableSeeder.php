<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Tournament;
use App\Models\User;
use App\Models\Venue;
use Carbon\Carbon;
use Faker\Factory as Faker;

class TournamentsTableSeeder extends Seeder
{
    public function run()
    {
        $faker = Faker::create();

        $venues = Venue::all();
        $users = User::all();

        foreach ($venues as $venue) {
            $user = $users->random();
            Tournament::create([
                'name' => $faker->sentence(1),
                'time' => $faker->dateTimeBetween('now', '+1 year'),
                'venue_id' => $venue->id,
                'user_id' => $user->id,
                'image'=> $faker->randomElement(['images/seedimg.png','images/seedimg2.png']),
                'description' => $faker->paragraph,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]);
        }
    }
}