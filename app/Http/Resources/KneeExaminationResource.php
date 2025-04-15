<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class KneeExaminationResource extends JsonResource
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
            'Genu' => $this->genu,
            'Morfotipo_Torsional' => $this->morfotipo_torsional,
            'Tipologia_Rotulas' => $this->tipologia_rotulas
        ];
    }
}
