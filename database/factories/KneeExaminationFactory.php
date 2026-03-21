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
            'genu' => fake()->randomElement(['Varo','Valgo','Normal']),
			'recurvatum' => fake()->randomElement(['Recurvatum','Flexo','Normal']),
        ];
    }
}
