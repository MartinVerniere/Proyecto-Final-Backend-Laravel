<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Patient;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class ConsultationFactory extends Factory
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
            'talla' => fake()->randomFloat(2, 1, 3),
            'peso' => fake()->randomFloat(2, 1, 3),
        ];
    }
}
