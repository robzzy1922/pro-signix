<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Ormawa>
 */
class OrmawaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'nim' => fake()->unique()->numerify('########'),
            'nama' => fake()->name(),
            'email' => fake()->unique()->safeEmail(),
            'ormawa' => fake()->randomElement(['FORMADIKSI', 'HIMATIF', 'HIMA-RPL', 'HIMAKES']),
            'password' => fake()->password(),
        ];
    }
}