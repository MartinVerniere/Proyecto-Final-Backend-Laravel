<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\FeetExamination>
 */
class FeetExaminationFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'eje_posterior' => fake()->randomElement(['Supinador','Neutro','Pronador']),
            'eje_anterior' => fake()->randomElement(['Valgo','Neutro','Varo']),
            'tipologia' => fake()->randomElement(['Egipcio','Griego','Romano']),
            'dedos_en_garra' => fake()->randomElement(['SI','NO']),
        ];
    }
}
