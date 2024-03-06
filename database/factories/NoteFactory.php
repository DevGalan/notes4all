<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Note;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Note>
 */
class NoteFactory extends Factory
{
    protected $model = Note::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'author' => $this->faker->randomElement(['Galan', 'Pepe', 'Admin']),
            'title' => $this->faker->sentence(),
            'text' => $this->faker->paragraph(),
            'category_name' => $this->faker->randomElement(['General', 'Personal', 'Trabajo']),
        ];
    }
}
