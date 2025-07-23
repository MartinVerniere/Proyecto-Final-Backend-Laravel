<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ConsultationResource extends JsonResource
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
            'Paciente' => $this->getNombrePaciente(),
            'Fecha_realizacion' => $this->getFechaUltimaExaminacionRealizada(),
            'Talla' => $this->talla,
            'Examinacion_antropogenica' => $this->anthropogenicalExamination ? $this->anthropogenicalExamination->id : null,
            'Examinacion_antropometrica' => $this->anthropometricalExamination ? $this->anthropometricalExamination->id : null,
            'Examinacion_fisica' => $this->physicalConditionExamination ? $this->physicalConditionExamination->id : null,
            'Examinacion_postura' => $this->postureExamination ? $this->postureExamination->id : null
        ];
    }
}
