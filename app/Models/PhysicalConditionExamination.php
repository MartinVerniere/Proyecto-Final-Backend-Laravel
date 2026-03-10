<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Consultation;

class PhysicalConditionExamination extends Model
{
    use HasFactory;

    protected $fillable = [
        'id_consulta',
        'fecha_realizacion',
        'talla_paciente',
		'talla_paciente_sentado',
        'peso_paciente',
		'presion_arterial_paciente',
        'valor_fuerza_presion_manual',
        'categoria_fuerza_presion_manual',
        'valor_fuerza_explosiva',
        'categoria_fuerza_explosiva',
        'valor_mobilidad_tobillo',
        'categoria_mobilidad_tobillo',
        #'evaluacion_sentadillas',
        #'evaluacion_activa_pierna',
        #'movilidad_hombros',
    ];

    public function consultation() {
        return $this->belongsTo(Consultation::class, 'id_consulta');
    }

    public static function añadirExaminacionFisica($request) {
        $examination = new PhysicalConditionExamination();

        $examination->id_consulta = $request->input('id_consulta');
        $examination->fecha_realizacion = $request->input('fecha_realizacion');
        $examination->talla_paciente = $request->input('talla_paciente');
		$examination->talla_paciente_sentado = $request->input('talla_paciente_sentado');
        $examination->peso_paciente = $request->input('peso_paciente');
		$examination->presion_arterial_paciente = $request->input('presion_arterial_paciente');
        $examination->valor_fuerza_presion_manual = $request->input('valor_fuerza_presion_manual');
        $examination->categoria_fuerza_presion_manual = $request->input('categoria_fuerza_presion_manual');
        $examination->valor_fuerza_explosiva = $request->input('valor_fuerza_explosiva');
        $examination->categoria_fuerza_explosiva = $request->input('categoria_fuerza_explosiva');
        $examination->valor_mobilidad_tobillo = $request->input('valor_mobilidad_tobillo');
        $examination->categoria_mobilidad_tobillo = $request->input('categoria_mobilidad_tobillo');
        #$examination->evaluacion_sentadillas = $request->input('evaluacion_sentadillas');
        #$examination->evaluacion_activa_pierna = $request->input('evaluacion_activa_pierna');
        #$examination->movilidad_hombros = $request->input('movilidad_hombros');

        $examination->save();

        return $examination->id;
    }

    public static function quitarExaminacionFisica($request) {
        $examination = $request->ExaminacionFisica;
        $examinationElem = PhysicalConditionExamination::find($id);
        $examinationElem->delete();
    }
}
