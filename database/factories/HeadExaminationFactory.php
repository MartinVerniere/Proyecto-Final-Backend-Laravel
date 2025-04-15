<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\HeadExamination>
 */
class HeadExaminationFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'plano' => fake()->randomElement(['Adelantado','Neutro','Retrazado']),
            'inclinacion' => fake()->randomElement(['SI','NO']),
            'mirada' => fake()->randomElement(['Inclinacion derecha','Normal','Inclinacion izquierda']),
            'caries' => fake()->randomElement(['SI','NO']),
            'oclusion' => fake()->randomElement(['Bien','Mal']),
        ];
    }
}
