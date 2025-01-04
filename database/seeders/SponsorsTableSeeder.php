<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SponsorsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('sponsors')->insert([
            [
                'name' => 'Telkomsel',
                'logo' => 'telkomsel_logo.png',
                'website' => 'https://telkomsel.com',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Red Bull',
                'logo' => 'redbull_logo.png',
                'website' => 'https://redbull.com',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Secret Lab',
                'logo' => 'secretlab_logo.png',
                'website' => 'https://secretlab.co',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'ROG',
                'logo' => 'rog_logo.png',
                'website' => 'https://rog.gg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Infinix',
                'logo' => 'infinix_logo.png',
                'website' => 'https://infinix.com',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Shopee',
                'logo' => 'shopee_logo.png',
                'website' => 'https://shopee.co.id',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'GoPay',
                'logo' => 'gopay_logo.png',
                'website' => 'https://gopay.co.id',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'UniPin',
                'logo' => 'unipin_logo.png',
                'website' => 'https://unipin.com',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'MNCTV',
                'logo' => 'mnctv_logo.png',
                'website' => 'https://mnctv.com',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Indomie',
                'logo' => 'indomie_logo.png',
                'website' => 'https://indomie.com',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Kopi Kapal Api',
                'logo' => 'kopi_kapal_api_logo.png',
                'website' => 'https://kopikapalapi.com',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => '2 Kelinci',
                'logo' => '2_kelinci_logo.png',
                'website' => 'https://2kelinci.com',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Mills',
                'logo' => 'mills_logo.png',
                'website' => 'https://mills.com',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Robot',
                'logo' => 'robot_logo.png',
                'website' => 'https://robot.com',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Garena',
                'logo' => 'garena_logo.png',
                'website' => 'https://garena.com',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}