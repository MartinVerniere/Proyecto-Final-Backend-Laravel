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
            'Id_Paciente' => $this->id_paciente,
            'Talla' => $this->talla,
            'Examinacion_antropogenica' => AnthropogenicalExaminationResource::collection($this->anthropogenicalExamination) ,
            'Examinacion_antropometrica' => AnthropometricalExaminationResource::collection($this->anthropometricalExamination),
            'Examinacion_Fisica' => PhysicalConditionExaminationResource::collection($this->physicalConditionExamination),
            'Examinacion_Postura' => PostureExaminationResource::collection($this->postureExamination)
        ];
    }
}
