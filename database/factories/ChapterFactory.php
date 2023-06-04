<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Chapter>
 */
class ChapterFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'number' => fake()->randomNumber(3, false),
            'images' => fake()->imageUrl(360, 360, 'animals', true, 'dogs', true),
            'project_id' => fake()->numberBetween(1, 300)
        ];
    }
}
