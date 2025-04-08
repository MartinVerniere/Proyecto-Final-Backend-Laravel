<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

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
            'Fecha_Realizacion' => $this->fecha_realizacion,
            'Talla' => $this->talla,
            'Examinacion_antropogenica' => AnthropogenicalExaminationResource::collection($this->examinaciones),
            'Examinacion_antropometrica' => AnthropometricalExaminationResource::collection($this->examinaciones),
            'Examinacion_Fisica' => FisicalConditionExaminationResource::collection($this->examinaciones),
        ];
    }
}
