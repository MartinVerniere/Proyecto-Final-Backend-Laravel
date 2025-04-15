<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class FeetExaminationResource extends JsonResource
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
            'Id_Examinacion_Postura' => $this->id_examinacion_postura,
            'Eje_Posterior' => $this->eje_posterior,
            'Eje_Anterior' => $this->eje_anterior,
            'Tipologia' => $this->tipologia,
            'Dedos_en_garra' => $this->dedos_en_garra
        ];
    }
}
