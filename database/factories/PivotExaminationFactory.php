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
            'cervical_C4_C5' => fake()->randomElement(['Hiperlordosis','Normal','Rectificado']),
            'dorsal_D8' => fake()->randomElement(['Lordotico','Normal','Cifotico']),
            'lumbar_L3' => fake()->randomElement(['Hiperlordosis','Normal','Rectificado']),
            'raquis' => fake()->randomElement(['Escoliotico','Rectificado','Cifolordotico']),
        ];
    }
}
