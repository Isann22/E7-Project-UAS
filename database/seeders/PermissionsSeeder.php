<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class PermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        Permission::create(['name' => 'view-all-data']);
        Permission::create(['name' => 'create-all-data']);
        Permission::create(['name' => 'update-all-data']);
        Permission::create(['name' => 'delete-all-data']);

        Permission::create(['name' => 'view-own-data']);
        Permission::create(['name' => 'create-own-data']);
        Permission::create(['name' => 'update-own-data']);
        Permission::create(['name' => 'delete-own-data']);
    }
}
