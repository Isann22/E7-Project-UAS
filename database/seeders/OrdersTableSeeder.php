<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Order;
use App\Models\User;
use App\Models\Ticket;
use Faker\Factory as Faker;
use Carbon\Carbon;

class OrdersTableSeeder extends Seeder
{
    public function run()
    {
        $faker = Faker::create();

        $users = User::all();
        $tickets = Ticket::all();

        foreach ($users as $user) {
            $ticket = $tickets->random();
            Order::create([
                'user_id' => $user->id,
                'ticket_id' => $ticket->id,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                'qty' => $faker->numberBetween(1, 30),
                'status' => 'pending',
            ]);
        }
    }
}
