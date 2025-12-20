<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Resources\ExaminationResource;
use App\Http\Resources\ConsultationCollection;

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
            'Genero' => $this->genero,
            'DNI' => $this->DNI,
            'Fecha_Nacimiento' => $this->fecha_nacimiento,
            'Consultas_Realizadas' => new ConsultationCollection($this->consultations),
        ];
    }
}
