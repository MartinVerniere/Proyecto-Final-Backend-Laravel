<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Resources\AnthropogenicalExaminationResource;
use App\Http\Resources\AnthropometricalExaminationResource;
use App\Http\Resources\PhysicalConditionExaminationResource;

class ExaminationResource extends JsonResource
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
            'Talla' => $this->talla,
            'Examinacion_antropogenica' => new AnthropogenicalExaminationResource($this->anthropogenicalExamination) ,
            'Examinacion_antropometrica' => new AnthropometricalExaminationResource($this->anthropometricalExamination),
            'Examinacion_fisica' => new PhysicalConditionExaminationResource($this->physicalConditionExamination),
            'Examinacion_postura' => new PostureExaminationResource($this->postureExamination)
        ];
    }
}
