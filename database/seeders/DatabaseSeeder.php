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
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        \App\Models\Author::factory(50)->create();
        \App\Models\Studio::factory(50)->create();
        \App\Models\Type::factory(5)->create();
        \App\Models\Status::factory(3)->create();
        \App\Models\Genre::factory(25)->create();
        \App\Models\Project::factory(150)->create();
    }
}
