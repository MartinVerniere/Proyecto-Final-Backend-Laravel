<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\PelvisExamination>
 */
class PelvisExaminationFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'eias' => fake()->randomElement(['Inclinacion izquierda','Normal','Inclinacion derecha']),
            'eips' => fake()->randomElement(['Inclinacion izquierda','Normal','Inclinacion derecha']),
            'relacion' => fake()->randomElement(['Anteversion','Neutra','Retroversion']),
            'rotacion' => fake()->randomElement(['Izquierda','Neutra','Derecha']),
        ];
    }
}
