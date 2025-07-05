<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Consultation;

class AnthropogenicalExamination extends Model
{
    use HasFactory;

    protected $fillable = [
        'id_consulta',
        'longitud_pierna',
        'talla_padre',
        'talla_madre',
        'talla_adulta',
        'talla_objetiva_genetica',
        'talla_falta_crecer',    
        'valor_IRMI',
        'categoria_IRMI',
        'valor_indice_cormico',
        'categoria_indice_cormico',
        'valor_indice_masa_corporal',
        'categoria_indice_masa_corporal',
        'valor_estadio_tanner',
        'categoria_estadio_tanner',
        'valor_indice_madurativo',
        'valor_edad_PHV',
        'categoria_edad_PHV'
    ];

    public function consultation() {
        return $this->belongsTo(Consultation::class, 'id_consulta');
    }

    public function añadirExaminacionAntropogenica($request) {
        $examination = new AnthropogenicalExamination();

        $examination->id_consulta = $request->input('id_consulta');
        $examination->fecha_realizacion = $request->input('fecha_realizacion');
        $examination->longitud_pierna = $request->input('longitud_pierna');
        $examination->talla_padre = $request->input('talla_padre');
        $examination->talla_madre = $request->input('talla_madre');
        $examination->talla_adulta = $request->input('talla_adulta');
        $examination->talla_objetiva_genetica = $request->input('talla_objetiva_genetica');
        $examination->talla_falta_crecer = $request->input('talla_falta_crecer');
        $examination->valor_IRMI = $request->input('valor_IRMI');
        $examination->categoria_IRMI = $request->input('categoria_IRMI');
        $examination->valor_indice_cormico = $request->input('valor_indice_cormico');    
        $examination->categoria_indice_cormico = $request->input('categoria_indice_cormico');
        $examination->valor_indice_masa_corporal = $request->input('valor_indice_masa_corporal');
        $examination->categoria_indice_masa_corporal = $request->input('categoria_indice_masa_corporal');
        $examination->valor_estadio_tanner = $request->input('valor_estadio_tanner');
        $examination->categoria_estadio_tanner = $request->input('categoria_estadio_tanner');
        $examination->valor_indice_madurativo = $request->input('valor_indice_madurativo');
        $examination->valor_edad_PHV = $request->input('valor_edad_PHV');
        $examination->categoria_edad_PHV = $request->input('categoria_edad_PHV');

        $examination->save();
    }

    public function quitarExaminacionAntropogenica($request) {
        $examination = $request->ExaminacionAntropogenica;
        $examinationElem = AnthropogenicalExamination::find($id);
        $examinationElem->delete();
    }
}
