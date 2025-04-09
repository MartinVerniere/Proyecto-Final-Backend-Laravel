<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Patient;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Patient>
 */
class PatientFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'nombre' => fake()->name(),
            'apellido' => fake()->name(), 
            'genero' => fake()->randomElement(['masculino', 'femenino']),
            'DNI' => fake()->randomNumber(8),
            'fecha_nacimiento' => fake()->date(),
        ];
    }
}
