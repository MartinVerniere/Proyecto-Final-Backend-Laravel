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

            'talla_paciente' => $this->faker->randomFloat(0,100),
			'talla_paciente_sentado' => $this->faker->randomFloat(0,100),
            'peso_paciente' => $this->faker->randomFloat(0,40),
			'presion_arterial_maxima_paciente' => $this->faker->randomFloat(0,60,200),
			'presion_arterial_minima_paciente' => $this->faker->randomFloat(0,60,150),

            'observaciones' => $this->faker->sentence(),
			
			// Añadir imagenes y keypoints si es necesario
        ];
    }
}
