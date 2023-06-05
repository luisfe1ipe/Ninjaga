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
        $images = [
            'battle-god.jpg',
            'o-comeco-depois-do-fim.jpg',
            'omniscient.jpg',
            'return-of-the-frozen-player.jpg',
            'solo-leveling.jpg',
            'the-player-who-cant-level-up.jpg',
            'world-after-end.jpg',
        ];

        shuffle($images);

        return [
            'number' => fake()->randomNumber(3, false),
            'images' => 'projects/chapters/' . array_shift($images),
            'project_id' => fake()->numberBetween(1, 150)
        ];
    }
}
