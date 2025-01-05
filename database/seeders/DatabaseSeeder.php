<?php

namespace Database\Seeders;

use App\Models\User;
use GuzzleHttp\Promise\Create;
use Illuminate\Database\Seeder;
use Spatie\Permission\Contracts\Permission;
use Spatie\Permission\Models\Role;

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
            PermissionsSeeder::class
        ]);

        $user = User::factory()->create(
            [
                'name' => 'admin',
                'email' => 'admin@gmail.com',
                'password' => bcrypt('admin')
            ]
        );

        $role = Role::create(['name' => 'admin']);
        $role->givePermissionTo([
            'view-all-data',
            'create-all-data',
            'update-all-data',
            'delete-all-data',
        ]);
        $user->assignRole($role);

        $user1 = User::factory()->create(
            [
                'name' => 'organizer',
                'email' => 'organizer@gmail.com',
                'password' => bcrypt('organizer')
            ]
        );

        $role1 = Role::create(['name' => 'organizer']);
        $role1->givePermissionTo([
            'view-own-data',
            'create-own-data',
            'update-own-data',
            'delete-own-data',
        ]);
        $user1->assignRole($role1);
    }
}
