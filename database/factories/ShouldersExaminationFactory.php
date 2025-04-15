<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class ShouldersExaminationFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'inclinacion' => fake()->randomElement(['Inclinacion derecha','Normal','Inclinacion izquierda']),
            'musculatura' => fake()->randomElement(['Hipertonica','Normal','Hipotonica']),
            'escapula' => fake()->randomElement(['Rotacion medial','Rotacion lateral','Angulo inferior izquierdo','Angulo inferior derecho','Aladas','Alineadas']),
            'hombro' => fake()->randomElement(['Antepulsion','Normal','Retropulsion']),
            'triangulo_de_talle' => fake()->randomElement(['Normal','Aumentado']),
        ];
    }
}
