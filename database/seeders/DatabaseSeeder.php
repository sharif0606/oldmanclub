<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call(
            [
                // NfcFieldSeeder::class,
                // NfcInformationSeeder::class,
                // CountriesSeeder::class,
                // StateSeeder::class,
                // CitiesSeeder::class
                // ClientSeeder::class,
                // PostSeeder::class
                FollowSeeder::class
            ]
        );



        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}