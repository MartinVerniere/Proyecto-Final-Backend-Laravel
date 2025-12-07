<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\PivotExamination>
 */
class PivotExaminationFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'cervical' => fake()->randomElement(['Lordotico','Normal','Rectificado','Cifotico']),
            'dorsal' => fake()->randomElement(['Lordotico','Normal','Rectificado','Cifotico']),
            'lumbar' => fake()->randomElement(['Lordotico','Normal','Rectificado','Cifotico']),
            'raquis' => fake()->randomElement(['Escoliotico','Rectificado']),
        ];
    }
}
