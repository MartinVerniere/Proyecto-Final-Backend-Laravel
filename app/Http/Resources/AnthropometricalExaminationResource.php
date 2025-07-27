<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class AnthropometricalExaminationResource extends JsonResource
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

            'Peso' => $this->peso_paciente,
            'Talla' => $this->talla_paciente,
            
            'Pliegues_triceps' => $this->pliegues_triceps,
            'Pliegues_subescapular' => $this->pliegues_subescapular,
            'Pliegues_supraespinal' => $this->pliegues_supraespinal,
            'Pliegues_abdominal' => $this->pliegues_abdominal,
            'Pliegues_muslo' => $this->pliegues_muslo,
            'Pliegues_pantorrilla' => $this->pliegues_pantorrilla,

            'Perimetro_brazo_relajado' => $this->perimetro_brazo_relajado,
            'Perimetro_brazo_contraido' => $this->perimetro_brazo_contraido,
            'Perimetro_cintura_minima' => $this->perimetro_cintura_minima,
            'Perimetro_cadera' => $this->perimetro_cadera,
            'Perimetro_muslo' => $this->perimetro_muslo,
            'Perimetro_pantorrilla' => $this->perimetro_pantorrilla,

            'Valor_indice_cintura_cadera' => $this->valor_indice_cintura_cadera,
            'Categoria_indice_cintura_cadera' => $this->categoria_indice_cintura_cadera,

            'Valor_indice_masa_grasa' => $this->valor_indice_masa_grasa,
            'Categoria_indice_masa_grasa' => $this->categoria_indice_masa_grasa,

            'Valor_indice_masa_muscular' => $this->valor_indice_masa_muscular,
            'Categoria_indice_masa_muscular' => $this->categoria_indice_masa_muscular,

            'Suma_pliegues' => $this->suma_pliegues
        ];
    } 
}
