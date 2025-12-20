<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class PostureExaminationFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'fecha_realizacion' => fake()->date(),
			'talla_paciente' => $this->faker->randomFloat(1,2),
            'peso_paciente' => $this->faker->randomFloat(1,2),
            'observaciones' => fake()->sentence(),
			
			// Añadir imagenes y keypoints si es necesario
        ];
    }
}
