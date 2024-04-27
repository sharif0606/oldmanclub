<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User\Client;
use App\Models\User\Follow;

class FollowSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Fetch all client IDs
        $clientIds = Client::pluck('id')->toArray();

        // Loop through each client ID
        foreach ($clientIds as $clientId) {
            // Generate a random number of follow relationships (1 to 10)
            $numberOfFollows = rand(1, 10);

            // Generate follow relationships for the current client ID
            for ($i = 0; $i < $numberOfFollows; $i++) {
                // Randomly select a following_id different from the current client_id
                $followingId = $clientIds[array_rand($clientIds)];
                while ($followingId == $clientId) {
                    $followingId = $clientIds[array_rand($clientIds)];
                }

                // Create follow relationship
                $follows[] = [
                    'follower_id' => $clientId,
                    'following_id' => $followingId,
                    'created_at' => now(),
                    'updated_at' => now(),
                ];
            }
        }

        // Insert follow relationships into the database
        Follow::insert($follows);
    }
}
