<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Resources\HeadExaminationResource;
use App\Http\Resources\ShouldersExaminationResource;
use App\Http\Resources\PelvisExaminationResource;
use App\Http\Resources\KneeExaminationResource;
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
            'Id_Examinacion' => $this->id_consulta,
            'Fecha_realizacion' => $this->fecha_realizacion,
            
            'Examinacion_Cabeza' => new HeadExaminationResource($this->analisisCabeza),
            'Examinacion_Hombros_Escapular' => new ShouldersExaminationResource($this->analisisHombrosEscapular),
            'Examinacion_Pelvis' => new PelvisExaminationResource($this->analisisPelvis),
            'Examinacion_Rodilla' => new KneeExaminationResource($this->analisisRodilla),
            'Examinacion_Pivot' => new PivotExaminationResource($this->analisisPivot),
            'Observaciones' => $this->observaciones
        ];
    }
}
