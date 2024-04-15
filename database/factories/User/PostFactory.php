<?php

namespace Database\Factories\User;

use App\Models\User\Client;
use Illuminate\Database\Eloquent\Factories\Factory;
/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'client_id' => Client::factory(), // Associate each post with an existing client
            'message' => $this->faker->paragraph,
            //'image' => $this->faker->imageUrl(640, 480, 'post-title'), // Generates a fake image URL
        ];
    }
}
