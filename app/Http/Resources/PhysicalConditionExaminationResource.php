<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class PhysicalConditionExaminationResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'Id' => $this->id,
            'Id_Examinacion' => $this->id_consulta,
			'Paciente' => $this->consultation->getNombrePaciente(),
            'Fecha_realizacion' => $this->fecha_realizacion,

            'Talla' => $this->talla_paciente,
			'Talla_sentado' => $this->talla_paciente_sentado,
			'Peso' => $this->peso_paciente,
			'Presion_arterial_maxima' => $this->presion_arterial_maxima_paciente,
			'Presion_arterial_minima' => $this->presion_arterial_minima_paciente,
            
            'Valor_fuerza_presion_manual' => $this->valor_fuerza_presion_manual,
            'Categoria_fuerza_presion_manual' => $this->categoria_fuerza_presion_manual,
            'Valor_fuerza_explosiva' => $this->valor_fuerza_explosiva,
            'Categoria_fuerza_explosiva' => $this->categoria_fuerza_explosiva,
            'Valor_mobilidad_tobillo' => $this->valor_mobilidad_tobillo,
            'Categoria_mobilidad_tobillo' => $this->categoria_mobilidad_tobillo,
        ];
    }
}
