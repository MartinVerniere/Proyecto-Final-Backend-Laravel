<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Examination;

class AnthropometricalExamination extends Model
{
    use HasFactory;

    protected $fillable = [
        'id_examinacion',
        'pliegues_triceps',
        'pliegues_subescapular',
        'pliegues_supraespinal',
        'pliegues_abdominal',
        'pliegues_muslo',
        'pliegues_pantorrilla',
        'perimetro_brazo_relajado',
        'perimetro_brazo_flexionado',
        'perimetro_cintura_minima',
        'perimetro_cadera',
        'perimetro_muslo',
        'perimetro_pantorrilla',
        'valor_indice_cintura_cadera',
        'categoria_indice_cintura_cadera',
        'valor_indice_masa_grasa',
        'categoria_indice_masa_grasa',
        'valor_indice_masa_muscular',
        'categoria_indice_masa_muscular',
        'suma_pliegues'
    ];

    public function examination() {
        return $this->belongsTo(Examination::class, 'id_examinacion');
    }

    public function añadirExaminacionAntropogenica($request) {
        $examination = new AnthropogenicalExamination();
    
        $examination->id_paciente = $request->input('id_paciente');
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
        $examination->valor_PHV = $request->input('valor_PHV');
        $examination->categoria_PHV = $request->input('categoria_PHV');
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
