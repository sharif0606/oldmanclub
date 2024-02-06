<?php

namespace Database\Factories\Backend;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\NfcInformation>
 */
class NfcInformationFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'prefix' => fake()->lexify('??') . '.',
            'suffix' => fake()->lexify('??') . '.',
            'accreditations' => fake()->word(),
            'preferred_name' => fake()->word(),
            'maiden_name' => fake()->word(),
            'pronoun' => fake()->word(),
            'title' => fake()->text(500),
            'department' => fake()->word(),
            'company' => fake()->word(),
            'headline' => fake()->text(100),
            'created_by' => 1,
        ];
    }
}
