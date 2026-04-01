<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ConsultationResource extends JsonResource
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
            'Paciente' => $this->getNombrePaciente(),
            'Id_Paciente' => $this->id_paciente,
            'Fecha_realizacion' => $this->getFechaUltimaExaminacionRealizada(),
            'Talla' => $this->talla,
			'Talla_sentado' => $this->talla_sentado,
            'Peso' => $this->peso,
			'Presion_arterial_maxima' => $this->presion_arterial_maxima,
			'Presion_arterial_minima' => $this->presion_arterial_minima,
            
			'Deporte' => $this->deporte ?? null,
			'Horas_gimnasio' => $this->horas_gimnasio ?? null,
			'Dias_gimnasio' => $this->dias_gimnasio ?? null,
			'Horas_gimnasio_totales' => $this->horas_semana_gimnasio ?? null,
			'Horas_entrenamiento' => $this->horas_entrenamiento ?? null,
			'Dias_entrenamiento' => $this->dias_entrenamiento ?? null,
			'Horas_entrenamiento_totales' => $this->horas_semana_entrenamiento ?? null,
			'Club' => $this->club ?? null,
			'Posicion' => $this->posicion ?? null,
			'Antecedentes_personales' => $this->antecedentes_personales ?? null,
			'Antecedentes_familiares' => $this->antecedentes_familiares ?? null,
			'Antecedentes_lesiones' => $this->antecedentes_lesiones ?? null,
			'Estudios_laboratorio' => $this->estudios_laboratorio ?? null,
			'Observaciones_estudios_laboratorio' => $this->observaciones_estudios_laboratorio ?? null,
			'Estudios_cardiologicos' => $this->estudios_cardiologicos ?? null,
			'Observaciones_estudios_cardiologicos' => $this->observaciones_estudios_cardiologicos ?? null,
			'Desayuna' => $this->desayuna ?? null,
			'Almuerza' => $this->almuerza ?? null,
			'Merienda' => $this->merienda ?? null,
			'Cena' => $this->cena ?? null,
			'Hidratacion' => $this->hidratacion ?? null,
			'Observaciones_alimentacion' => $this->observaciones_alimentacion ?? null,
			'Anotaciones' => $this->anotaciones ?? null,
			
			'Examinacion_madurativa' => $this->madurativeExamination?->id ?? null,
			'Examinacion_antropometrica' => $this->anthropometricalExamination?->id ?? null,
			'Examinacion_fisica' => $this->physicalConditionExamination?->id ?? null,
			'Examinacion_postura' => $this->postureExamination?->id ?? null,			
        ];
    }
}
