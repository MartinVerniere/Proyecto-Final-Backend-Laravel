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
            
			'Imagen_Frontal' => $this->imagen_frontal,
			'Imagen_Lateral_Derecha' => $this->imagen_lateral_derecha,
			'Imagen_Lateral_Izquierda' => $this->imagen_lateral_izquierda,
			'Imagen_Trasera' => $this->imagen_trasera,

			'Keypoints_Frontal' => $this->keypoints_frontal,
			'Keypoints_Lateral_Derecha' => $this->keypoints_lateral_derecha,
			'Keypoints_Lateral_Izquierda' => $this->keypoints_lateral_izquierda,
			'Keypoints_Trasera' => $this->keypoints_trasera,

            'Examinacion_Cabeza' => new HeadExaminationResource($this->analisisCabeza),
            'Examinacion_Hombros_Escapular' => new ShouldersExaminationResource($this->analisisHombrosEscapular),
            'Examinacion_Pelvis' => new PelvisExaminationResource($this->analisisPelvis),
            'Examinacion_Rodilla' => new KneeExaminationResource($this->analisisRodilla),
            'Examinacion_Pivot' => new PivotExaminationResource($this->analisisPivot),
            'Observaciones' => $this->observaciones
        ];
    }
}
