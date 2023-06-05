<?php

namespace Database\Factories;

use App\Models\Genre;
use App\Models\Project;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Project>
 */
class ProjectFactory extends Factory
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
            'title' => fake()->sentence(3),
            'synopsis' => fake()->text(),
            'released_year' => fake()->numberBetween(2015, 2023),
            'banner' => 'projects/' . array_shift($images),
            'visible' => fake()->numberBetween(0,1),
            'author_id' => fake()->numberBetween(1, 50),
            'studio_id' => fake()->numberBetween(1, 50),
            'type_id' => fake()->numberBetween(1, 5),
            'status_id' => fake()->numberBetween(1, 3),
            'created_at' => fake()->date(),
        ];

    }

    public function configure()
    {
        return $this->afterCreating(function (Project $project) {
            $project->genres()->attach(Genre::inRandomOrder()->limit(rand(1,8))->pluck('id'));
        });
    }
}
