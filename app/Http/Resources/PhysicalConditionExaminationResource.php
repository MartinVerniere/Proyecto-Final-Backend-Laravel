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
            'Fecha_realizacion' => $this->fecha_realizacion,
            
            'Valor_fuerza_presion_manual' => $this->valor_fuerza_presion_manual,
            'Categoria_fuerza_presion_manual' => $this->categoria_fuerza_presion_manual,
            'Valor_fuerza_explosiva' => $this->valor_fuerza_explosiva,
            'Categoria_fuerza_explosiva' => $this->categoria_fuerza_explosiva,
            'Valor_mobilidad_tobillo' => $this->valor_mobilidad_tobillo,
            'Categoria_mobilidad_tobillo' => $this->categoria_mobilidad_tobillo,
            // 'Evaluacion_sentadillas' => $this->evaluacion_sentadillas,
            // 'Evaluacion_activa_pierna' => $this->evaluacion_activa_pierna,
            // 'Movilidad_hombros' => $this->movilidad_hombros,
        ];
    }
}
