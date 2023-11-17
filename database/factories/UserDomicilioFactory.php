<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\UserDomicilio>
 */
class UserDomicilioFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'domicilio' => fake()->words(3, true),
            'numero_exterior' => fake()->randomNumber(4),
            'colonia' => fake()->words(2, true),
            'cp' => fake()->randomNumber(5),
            'ciudad'=> fake()->words(2, true),
        ];
    }
}
