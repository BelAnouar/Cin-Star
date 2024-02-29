<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\SalleDeCinema>
 */
class SalleDeCinemaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'salle_name' => $this->faker->word,
            'number_seats' => $this->faker->numberBetween(100, 500),
        ];
    }
}
