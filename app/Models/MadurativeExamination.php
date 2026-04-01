<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Consultation;

class MadurativeExamination extends Model
{
    use HasFactory;

    protected $fillable = [
        'id_consulta',
        'fecha_realizacion',
        'talla_paciente',
		'talla_paciente_sentado',
        'peso_paciente',
		'presion_arterial_maxima_paciente',
		'presion_arterial_minima_paciente',
        'longitud_pierna',
		'categoria_nivel_de_actividad',
		'valor_nivel_de_actividad',
		'valor_EER',
		'tasa_metabolica_basal',
		'gasto_energetico_total_estimado',
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
        'estadio_tanner',
        'valor_indice_madurativo',
        'valor_edad_PHV',
        'categoria_edad_PHV'
    ];

    public function consultation() {
        return $this->belongsTo(Consultation::class, 'id_consulta');
    }

    public static function añadirExaminacionMadurativa($request) {
        $examination = new MadurativeExamination();

        $examination->id_consulta = $request->input('id_consulta');
        $examination->fecha_realizacion = $request->input('fecha_realizacion');
        $examination->talla_paciente = $request->input('talla_paciente');
		$examination->talla_paciente_sentado = $request->input('talla_paciente_sentado');
        $examination->peso_paciente = $request->input('peso_paciente');
		$examination->presion_arterial_maxima_paciente = $request->input('presion_arterial_maxima_paciente');
		$examination->presion_arterial_minima_paciente = $request->input('presion_arterial_minima_paciente');
        $examination->longitud_pierna = $request->input('longitud_pierna');
		$examination->categoria_nivel_de_actividad = $request->input('categoria_nivel_de_actividad');
		$examination->valor_nivel_de_actividad = $request->input('valor_nivel_de_actividad');
		$examination->valor_EER = $request->input('valor_EER');
		$examination->tasa_metabolica_basal = $request->input('tasa_metabolica_basal');
		$examination->gasto_energetico_total_estimado = $request->input('gasto_energetico_total_estimado');
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
        $examination->estadio_tanner = $request->input('estadio_tanner');
        $examination->valor_indice_madurativo = $request->input('valor_indice_madurativo');
        $examination->valor_edad_PHV = $request->input('valor_edad_PHV');
        $examination->categoria_edad_PHV = $request->input('categoria_edad_PHV');

        $examination->save();

        return $examination->id;
    }

	public static function actualizarExaminacionMadurativa($request, $id_examination) {
		$examination = MadurativeExamination::find($id_examination);

        $examination->fecha_realizacion = $request->input('fecha_realizacion');
        $examination->talla_paciente = $request->input('talla_paciente');
		$examination->talla_paciente_sentado = $request->input('talla_paciente_sentado');
        $examination->peso_paciente = $request->input('peso_paciente');
		$examination->presion_arterial_maxima_paciente = $request->input('presion_arterial_maxima_paciente');
		$examination->presion_arterial_minima_paciente = $request->input('presion_arterial_minima_paciente');
        $examination->longitud_pierna = $request->input('longitud_pierna');
		$examination->categoria_nivel_de_actividad = $request->input('categoria_nivel_de_actividad');
		$examination->valor_nivel_de_actividad = $request->input('valor_nivel_de_actividad');
		$examination->valor_EER = $request->input('valor_EER');
		$examination->tasa_metabolica_basal = $request->input('tasa_metabolica_basal');
		$examination->gasto_energetico_total_estimado = $request->input('gasto_energetico_total_estimado');
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
        $examination->estadio_tanner = $request->input('estadio_tanner');
        $examination->valor_indice_madurativo = $request->input('valor_indice_madurativo');
        $examination->valor_edad_PHV = $request->input('valor_edad_PHV');
        $examination->categoria_edad_PHV = $request->input('categoria_edad_PHV');

		$examination->save();

        return $examination->id;
    }

    public static function quitarExaminacionMadurativa($id) {
        $examinationElem = MadurativeExamination::find($id);
        $examinationElem->delete();
    }
}
