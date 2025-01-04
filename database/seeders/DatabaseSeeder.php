<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            UsersTableSeeder::class,
            VenueTableSeeder::class,
            TournamentsTableSeeder::class,
            TicketsTableSeeder::class,
            OrdersTableSeeder::class,
            SponsorsTableSeeder::class,
        ]);
    }
}