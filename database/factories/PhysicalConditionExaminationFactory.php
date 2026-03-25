<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class PhysicalConditionExaminationFactory extends Factory
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
            
            'valor_fuerza_presion_manual' => $this->faker->randomFloat(0, 0, 100),
            'categoria_fuerza_presion_manual' => $this->faker->randomElement(['Muy bajo','Bajo','Medio','Alto','Muy alto']),

            'valor_fuerza_explosiva' => $this->faker->randomFloat(0, 0, 100),
            'categoria_fuerza_explosiva' => $this->faker->randomElement(['Muy bajo','Bajo','Medio','Alto','Muy alto']),

            'valor_mobilidad_tobillo' => $this->faker->randomFloat(0, 0, 20),
            'categoria_mobilidad_tobillo' => $this->faker->randomElement(['Rigidez','Bien']),
        ];
    }
}
