<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

use function Laravel\Prompts\table;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Note>
 */
class NoteFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => $this->faker->sentence,
            'content' => $this->faker->paragraph,
            'user_id' => \App\Models\User::factory(),
        ];
    }
}
