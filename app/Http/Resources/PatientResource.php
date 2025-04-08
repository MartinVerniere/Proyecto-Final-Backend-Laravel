<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class PatientResource extends JsonResource
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
            'Nombre' => $this->nombre,
            'Apellido' => $this->apellido,
            'DNI' => $this->DNI,
            'Fecha_Nacimiento' => $this->fecha_nacimiento,
            'Examinaciones' => ExaminationResource::collection($this->examinaciones),
        ];
    }
}
