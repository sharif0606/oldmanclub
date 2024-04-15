<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User\Post;
use App\Models\User\Client;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Define the number of posts you want to create
        $numberOfPosts = 10;

        // Retrieve existing clients from the database
        $clients = Client::all();

        // Create posts associated with each client
        foreach ($clients as $client) {
            // Create posts for each client
            Post::factory()->count($numberOfPosts)->create([
                'client_id' => $client->id,
            ]);
        }
    }
}
