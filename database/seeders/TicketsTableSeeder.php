<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Ticket;
use App\Models\Tournament;
use Faker\Factory as Faker;
use Carbon\Carbon;

class TicketsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();

        $tournaments = Tournament::all();

        foreach ($tournaments as $tournament) {
            Ticket::create([
                'price' => $faker->numberBetween(0, 200000),
                'stock' => $faker->numberBetween(20, 50),
                'tournament_id' => $tournament->id,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]);
        }
    }
}
