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
        $horas_gimnasio = fake()->numberBetween(2, 8);
        $dias_gimnasio = fake()->numberBetween(0, 7);

        $horas_entrenamiento = fake()->numberBetween(2, 8);
        $dias_entrenamiento = fake()->numberBetween(0, 7);

        return [
            'id_paciente' => $this->faker->randomElement(Patient::pluck('id')),
            'fecha_realizacion' => fake()->date(),
			'talla' => $this->faker->randomFloat(1,2),
			'talla_sentado' => $this->faker->randomFloat(1,2),
            'peso' => $this->faker->randomFloat(1,2),
			'presion_arterial_maxima' => $this->faker->randomFloat(1,2),
			'presion_arterial_minima' => $this->faker->randomFloat(1,2),
			'deporte' => fake()->word(),
            'horas_gimnasio' => $horas_gimnasio,
            'dias_gimnasio' => $dias_gimnasio,
            'horas_semana_gimnasio' => $horas_gimnasio * $dias_gimnasio,
            'horas_entrenamiento' => $horas_entrenamiento,
            'dias_entrenamiento' => $dias_entrenamiento,
            'horas_semana_entrenamiento' => $horas_entrenamiento * $dias_entrenamiento,
            'club' => fake()->company(),
            'posicion' => fake()->word(),
            'antecedentes_personales' => fake()->sentence(),
            'antecedentes_familiares' => fake()->sentence(),
            'antecedentes_lesiones' => fake()->sentence(),
            'estudios_laboratorio' => fake()->sentence(),
            'observaciones_estudios_laboratorio' => fake()->sentence(),
            'estudios_cardiologicos' => fake()->sentence(),
            'observaciones_estudios_cardiologicos' => fake()->sentence(),
            'desayuna' => fake()->boolean() ? true : false,
            'almuerza' => fake()->boolean() ? true : false,
            'merienda' => fake()->boolean() ? true : false,
            'cena' => fake()->boolean() ? true : false,
            'hidratacion' => fake()->numberBetween(1, 10),
			'observaciones_alimentacion' => fake()->sentence(),
            'anotaciones' => fake()->sentence(),
        ];
    }
}
