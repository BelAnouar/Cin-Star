<?php

namespace Database\Factories;

use App\Models\SalleDeCinema;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Zone>
 */
class ZoneFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'nbre_seat' => $this->faker->numberBetween(50, 200),
            'nbre_row' => $this->faker->numberBetween(5, 15),

        ];
    }
}
