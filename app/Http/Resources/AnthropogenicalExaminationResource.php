<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class AnthropogenicalExaminationResource extends JsonResource
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
            'Longitud_pierna' => $this->longitud_pierna,
            'Talla_padre' => $this->talla_padre,
            'Talla_madre' => $this->talla_madre,
            'Talla_adulta' => $this->talla_adulta,
            'Talla_objetiva_genetica' => $this->talla_objetiva_genetica,
            'Talla_falta_crecer' => $this->talla_falta_crecer,
            'IRMI' => $this->valor_IRMI,
            'Categoria_IRMI' => $this->categoria_IRMI,
            'Indice_cormico' => $this->valor_indice_cormico,
            'Categoria_indice_cormico' => $this->categoria_indice_cormico,
            'Indice_masa_corporal' => $this->valor_indice_masa_corporal,
            'Categoria_indice_masa_corporal' => $this->categoria_indice_masa_corporal,
            'Estadio_tanner' => $this->valor_estadio_tanner,
            'Categoria_estadio_tanner' => $this->categoria_estadio_tanner,
            'PHV' => $this->valor_PHV,
            'Categoria_PHV' => $this->categoria_PHV,
            'Edad_PHV' => $this->valor_edad_PHV,
            'Categoria_edad_PHV' => $this->categoria_edad_PHV
        ];
    }
}
