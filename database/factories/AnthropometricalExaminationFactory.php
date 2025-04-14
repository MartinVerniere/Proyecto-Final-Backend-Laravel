<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\AnthropometricalExamination>
 */
class AnthropometricalExaminationFactory extends Factory
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
            
            'pliegues_triceps' => $this->faker->numberBetween(1, 20),
            'pliegues_subescapular' => $this->faker->numberBetween(1, 20),
            'pliegues_supraespinal' => $this->faker->numberBetween(1, 20),
            'pliegues_abdominal' => $this->faker->numberBetween(1, 20),
            'pliegues_muslo' => $this->faker->numberBetween(1, 20),
            'pliegues_pantorrilla' => $this->faker->numberBetween(1, 20),

            'perimetro_brazo_relajado' => $this->faker->randomFloat(20, 150, 2),
            'perimetro_brazo_flexionado' => $this->faker->randomFloat(20, 150, 2),
            'perimetro_cintura_minima' => $this->faker->randomFloat(20, 150, 2),
            'perimetro_cadera' => $this->faker->randomFloat(20, 150, 2),
            'perimetro_muslo' => $this->faker->randomFloat(20, 150, 2),
            'perimetro_pantorrilla' => $this->faker->randomFloat(20, 150, 2),

            'valor_indice_cintura_cadera' => $this->faker->randomFloat(0, 2, 2),
            'categoria_indice_cintura_cadera' => $this->faker->randomElement(['Bajo','Moderado','Alto','Muy alto']),

            'valor_indice_masa_grasa' => $this->faker->randomFloat(0, 50, 2),
            'categoria_indice_masa_grasa' => $this->faker->randomElement(['Muy bajo','Bajo','Medio','Alto','Muy alto']),

            'valor_indice_masa_muscular' => $this->faker->randomFloat(0, 50, 2),
            'categoria_indice_masa_muscular' => $this->faker->randomElement(['Bajo','Moderado','Alto']),

            'suma_pliegues' => $this->faker->numberBetween(1, 100),
        ];
    }
}
