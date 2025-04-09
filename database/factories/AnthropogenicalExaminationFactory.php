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
            'longitud_pierna' => $this->faker->randomFloat(1,2),
            'talla_padre' => $this->faker->randomFloat(1,2),
            'talla_madre' => $this->faker->randomFloat(1,2),

            'talla_adulta' => $this->faker->randomFloat(1,2),
            'talla_objetiva_genetica' => $this->faker->randomFloat(1,2),
            'talla_falta_crecer' => $this->faker->randomFloat(1,2),

            'valor_IRMI' => $this->faker->randomFloat(1,2),
            'categoria_IRMI' => $this->faker->randomElement(['0','1','2']),

            'valor_indice_cormico' => $this->faker->randomFloat(1,2),
            'categoria_indice_cormico' => $this->faker->randomElement(['Corto','Medio','Largo']),

            'valor_indice_masa_corporal' => $this->faker->randomFloat(1,2),
            'categoria_indice_masa_corporal' => $this->faker->randomElement(['Peso insuficiente','Normopeso','Sobrepeso tipo I','Sobrepeso tipo II','Obesidad tipo I','Obesidad tipo II','Obesidad tipo III']),

            'valor_estadio_tanner' => $this->faker->randomFloat(1,2),
            'categoria_estadio_tanner' => $this->faker->randomElement(['I','II','III','IV','V']),

            'valor_indice_madurativo' => $this->faker->randomFloat(1,2),

            'valor_edad_PHV' => $this->faker->randomFloat(1,2),
            'categoria_PHV' => $this->faker->randomElement(['Temprano','Normal','Tardio']),
        ];
    }
}
