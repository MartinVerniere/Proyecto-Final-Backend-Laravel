<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class PivotExaminationResource extends JsonResource
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
            'Cervical_C4_C5' => $this->cervical_C4_C5,
            'Dorsal_D8' => $this->dorsal_D8,
            'Lumbar_L3' => $this->lumbar_L3,
            'Raquis_Escoliotico' => $this->raquis_escoliotico,
            'Raquis_Rectificado' => $this->raquis_rectificado,
            'Raquis_Cifolordotico' => $this->raquis_cifolordotico
        ];
    }
}
