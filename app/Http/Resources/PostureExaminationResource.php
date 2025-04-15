<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Resources\HeadExaminationResource;
use App\Http\Resources\ShouldersExaminationResource;
use App\Http\Resources\PelvisExaminationResource;
use App\Http\Resources\KneeExaminationResource;
use App\Http\Resources\FeetExaminationResource;
use App\Http\Resources\PivotExaminationResource;

class PostureExaminationResource extends JsonResource
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
            'Id_Examinacion' => $this->id_examinacion,
            'Examinacion_Cabeza' => HeadExaminationResource::collection($this->headExamination),
            'Examinacion_Hombros_Escapular' => ShouldersExaminationResource::collection($this->shouldersExamination),
            'Examinacion_Pelvis' => PelvisExaminationResource::collection($this->pelvisExamination),
            'Examinacion_Rodilla' => KneeExaminationResource::collection($this->kneeExamination),
            'Examinacion_Pie' => FeetExaminationResource::collection($this->feetExamination),
            'Examinacion_Pivot' => PivotExaminationResource::collection($this->pivotExamination),
            'Observaciones' => $this->observaciones
        ];
    }
}
