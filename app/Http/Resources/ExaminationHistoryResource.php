<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Resources\AnthropometricalExaminationResource;
use App\Http\Resources\AnthropogenicalExaminationResource;
use App\Http\Resources\PhysicalConditionExaminationResource;
use App\Http\Resources\PostureExaminationResource;

class ExaminationHistoryResource extends JsonResource
{
	/**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        $consultations = $this->consultations;

        return [
            'Historial_Antropometrico' => AnthropometricalExaminationResource::collection(
                $consultations->pluck('anthropometricalExamination')->filter()
            ),

            'Historial_Antropogenico' => AnthropogenicalExaminationResource::collection(
                $consultations->pluck('anthropogenicalExamination')->filter()
            ),

            'Historial_Fisico' => PhysicalConditionExaminationResource::collection(
                $consultations->pluck('physicalConditionExamination')->filter()
            ),

            'Historial_Postura' => PostureExaminationResource::collection(
                $consultations->pluck('postureExamination')->filter()
            ),
        ];
    }
}
