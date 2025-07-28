<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Consultation;

class AnthropometricalExamination extends Model
{
    use HasFactory;

    protected $fillable = [
        'id_consulta',
        'fecha_realizacion',
        'talla_paciente',
        'peso_paciente',
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

    public function consultation() {
        return $this->belongsTo(Consultation::class, 'id_consulta');
    }

    public static function añadirExaminacionAntropometrica($request) {
        $examination = new AnthropometricalExamination();

        $examination->id_consulta = $request->input('id_consulta');
        $examination->fecha_realizacion = $request->input('fecha_realizacion');
        $examination->talla_paciente = $request->input('talla_paciente');
        $examination->peso_paciente = $request->input('peso_paciente');
        $examination->pliegues_triceps = $request->input('pliegues_triceps');
        $examination->pliegues_subescapular = $request->input('pliegues_subescapular');
        $examination->pliegues_supraespinal = $request->input('pliegues_supraespinal');
        $examination->pliegues_abdominal = $request->input('pliegues_abdominal');
        $examination->pliegues_muslo = $request->input('pliegues_muslo');
        $examination->pliegues_pantorrilla = $request->input('pliegues_pantorrilla');
        $examination->perimetro_brazo_relajado = $request->input('perimetro_brazo_relajado');
        $examination->perimetro_brazo_flexionado = $request->input('perimetro_brazo_flexionado');
        $examination->perimetro_cintura_minima = $request->input('perimetro_cintura_minima');
        $examination->perimetro_cadera = $request->input('perimetro_cadera');
        $examination->perimetro_muslo = $request->input('perimetro_muslo');
        $examination->perimetro_pantorrilla = $request->input('perimetro_pantorrilla');
        $examination->valor_indice_cintura_cadera = $request->input('valor_indice_cintura_cadera');
        $examination->categoria_indice_cintura_cadera = $request->input('categoria_indice_cintura_cadera');
        $examination->valor_indice_masa_grasa = $request->input('valor_indice_masa_grasa');
        $examination->categoria_indice_masa_grasa = $request->input('categoria_indice_masa_grasa');
        $examination->valor_indice_masa_muscular = $request->input('valor_indice_masa_muscular');
        $examination->categoria_indice_masa_muscular = $request->input('categoria_indice_masa_muscular');
        $examination->suma_pliegues = $request->input('suma_pliegues');
    
        $examination->save();

        return $examination->id;
    }

    public static function quitarExaminacionAntropometrica($request) {
        $examination = $request->ExaminacionAntropometrica;
        $examinationElem = AnthropometricalExamination::find($id);
        $examinationElem->delete();
    }
}
