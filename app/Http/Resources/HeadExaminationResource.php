<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class HeadExaminationResource extends JsonResource
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
            'Plano' => $this->plano,
            'Inclinacion' => $this->inclinacion,
            'Mirada' => $this->mirada,
			'Keypoints' => $this->keypoints,
			'Imagen' => $this->imagen
        ];
    }
}
