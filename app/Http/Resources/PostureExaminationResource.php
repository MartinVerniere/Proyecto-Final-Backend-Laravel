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
            'Examinacion_Cabeza' => new HeadExaminationResource($this->headExamination),
            'Examinacion_Hombros_Escapular' => new ShouldersExaminationResource($this->shouldersExamination),
            'Examinacion_Pelvis' => new PelvisExaminationResource($this->pelvisExamination),
            'Examinacion_Rodilla' => new KneeExaminationResource($this->kneeExamination),
            'Examinacion_Pie' => new FeetExaminationResource($this->feetExamination),
            'Examinacion_Pivot' => new PivotExaminationResource($this->pivotExamination),
            'Observaciones' => $this->observaciones
        ];
    }
}
