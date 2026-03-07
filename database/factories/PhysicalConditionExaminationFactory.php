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

			'talla_paciente' => $this->faker->randomFloat(1,2),
            'peso_paciente' => $this->faker->randomFloat(1,2),
            
            'valor_fuerza_presion_manual' => $this->faker->randomFloat(1, 0, 10),
            'categoria_fuerza_presion_manual' => $this->faker->randomElement(['Muy bajo','Bajo','Medio','Alto','Muy alto']),

            'valor_fuerza_explosiva' => $this->faker->randomFloat(1, 0, 10),
            'categoria_fuerza_explosiva' => $this->faker->randomElement(['Muy bajo','Bajo','Medio','Alto','Muy alto']),

            'valor_mobilidad_tobillo' => $this->faker->randomFloat(1, 0, 10),
            'categoria_mobilidad_tobillo' => $this->faker->randomElement(['Rigidez','Bien']),
        ];
    }
}
