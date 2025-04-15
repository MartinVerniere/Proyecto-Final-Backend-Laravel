<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\KneeExamination>
 */
class KneeExaminationFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'genu' => fake()->randomElement(['Varo','Valgo','Recurbatum','Flexo','Normal']),
            'morfotipo_torsional' => fake()->randomElement(['SI','NO']),
            'tipologia_rotulas' => fake()->randomElement(['Convexa','Normal','Divergente']),
        ];
    }
}
