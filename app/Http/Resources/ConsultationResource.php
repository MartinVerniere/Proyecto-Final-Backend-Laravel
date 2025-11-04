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
            'Peso' => $this->peso,
            
            'Deporte' => $this->deporte ? $this->deporte : null,
            'Horas_gimnasio' => $this->horas_gimnasio ? $this->horas_gimnasio : null,
            'Dias_gimnasio' => $this->dias_gimnasio ? $this->dias_gimnasio : null,
            'Horas_gimnasio_totales' => $this->horas_semana_gimnasio ? $this->horas_semana_gimnasio : null,
            'Horas_entrenamiento' => $this->horas_entrenamiento ? $this->horas_entrenamiento : null,
            'Dias_entrenamiento' => $this->dias_entrenamiento ? $this->dias_entrenamiento : null,
            'Horas_entrenamiento_totales' => $this->horas_semana_entrenamiento ? $this->horas_semana_entrenamiento : null,
            'Club' => $this->club ? $this->club : null,
            'Posicion' => $this->posicion ? $this->posicion : null,
            'Antecedentes_personales' => $this->antecedentes_personales ? $this->antecedentes_personales : null,
            'Antecedentes_familiares' => $this->antecedentes_familiares ? $this->antecedentes_familiares : null,
            'Antecedentes_lesiones' => $this->antecedentes_lesiones ? $this->antecedentes_lesiones : null,
            'Estudios_laboratorio' => $this->estudios_laboratorio ? $this->estudios_laboratorio : null,
            'Observaciones_estudios_laboratorio' => $this->observaciones_estudios_laboratorio ? $this->observaciones_estudios_laboratorio : null,
            'Estudios_cardiologicos' => $this->estudios_cardiologicos ? $this->estudios_cardiologicos : null,
            'Observaciones_estudios_cardiologicos' => $this->observaciones_estudios_cardiologicos ? $this->observaciones_estudios_cardiologicos : null,
            'Desayuna' => $this->desayuna !== null ? $this->desayuna : null,
            'Almuerza' => $this->almuerza !== null ? $this->almuerza : null,
            'Merienda' => $this->merienda !== null ? $this->merienda : null,
            'Cena' => $this->cena !== null ? $this->cena : null,
            'Hidratacion' => $this->hidratacion ? $this->hidratacion : null,
            'Anotaciones' => $this->anotaciones ? $this->anotaciones : null,


            'Examinacion_antropogenica' => $this->anthropogenicalExamination ? $this->anthropogenicalExamination->id : null,
            'Examinacion_antropometrica' => $this->anthropometricalExamination ? $this->anthropometricalExamination->id : null,
            'Examinacion_fisica' => $this->physicalConditionExamination ? $this->physicalConditionExamination->id : null,
            'Examinacion_postura' => $this->postureExamination ? $this->postureExamination->id : null
        ];
    }
}
