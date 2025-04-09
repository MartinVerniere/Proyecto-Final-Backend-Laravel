<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Examination>
 */
class ExaminationFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'id_paciente' => $this->faker->randomElement(Patient::pluck('id')),
            'fecha_realizacion' => fake()->date(),
            'talla' => fake()->randomFloat(2, 1, 3)
        ];
    }
}
