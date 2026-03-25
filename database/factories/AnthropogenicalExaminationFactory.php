<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\AnthropogenicalExamination>
 */
class AnthropogenicalExaminationFactory extends Factory
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
            
            'longitud_pierna' => $this->faker->randomFloat(0,40),

			'categoria_nivel_de_actividad' =>  $this->faker->randomElement(['Sedentaria','Liviana','Moderada','Intensa','Extremada']),
			'valor_nivel_de_actividad' => $this->faker->randomFloat(1,2),
			'valor_EER' => $this->faker->randomFloat(1,2),

			'tasa_metabolica_basal' => $this->faker->randomFloat(1,2),
			'gasto_energetico_total_estimado' => $this->faker->randomFloat(1,2),

            'talla_padre' => $this->faker->randomFloat(0,100),
            'talla_madre' => $this->faker->randomFloat(0,100),

            'talla_adulta' => $this->faker->randomFloat(0,100),
            'talla_objetiva_genetica' => $this->faker->randomFloat(0,100),
            'talla_falta_crecer' => $this->faker->randomFloat(0,100),

            'valor_IRMI' => $this->faker->randomFloat(1,2),
            'categoria_IRMI' => $this->faker->randomElement(['0','1','2']),

            'valor_indice_cormico' => $this->faker->randomFloat(1,2),
            'categoria_indice_cormico' => $this->faker->randomElement(['Corto','Medio','Largo']),

            'valor_indice_masa_corporal' => $this->faker->randomFloat(1,2),
            'categoria_indice_masa_corporal' => $this->faker->randomElement(['Peso insuficiente','Normopeso','Sobrepeso tipo I','Sobrepeso tipo II','Obesidad tipo I','Obesidad tipo II','Obesidad tipo III']),

            'estadio_tanner' => $this->faker->randomElement(['I','II','III','IV','V']),
            'valor_indice_madurativo' => $this->faker->randomFloat(1,2),
            'valor_edad_PHV' => $this->faker->randomFloat(1,2),
            'categoria_edad_PHV' => $this->faker->randomElement(['Temprano','Normal','Tardio']),
        ];
    }
}
