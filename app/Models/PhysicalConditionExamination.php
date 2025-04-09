<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Examination;

class PhysicalConditionExamination extends Model
{
    use HasFactory;

    protected $fillable = [
        'examination_id',
        'valor_fuerza_presion_manual',
        'categoria_fuerza_presion_manual',
        'valor_fuerza_explosiva',
        'categoria_fuerza_explosiva',
        'valor_mobilidad_tobillo',
        'categoria_mobilidad_tobillo',
        'evaluacion_sentadillas',
        'evaluacion_activa_pierna',
        'movilidad_hombros',
    ];

    public function examination() {
        return $this->belongsTo(Examination::class, 'examination_id');
    }

    public function añadirExaminacionFisica($request) {
        $examination = new PhysicalConditionExamination();

        $examination->id_paciente = $request->input('id_paciente');
        $examination->fecha_realizacion = $request->input('fecha_realizacion');
        $examination->valor_fuerza_presion_manual = $request->input('valor_fuerza_presion_manual');
        $examination->categoria_fuerza_presion_manual = $request->input('categoria_fuerza_presion_manual');
        $examination->valor_fuerza_explosiva = $request->input('valor_fuerza_explosiva');
        $examination->categoria_fuerza_explosiva = $request->input('categoria_fuerza_explosiva');
        $examination->valor_mobilidad_tobillo = $request->input('valor_mobilidad_tobillo');
        $examination->categoria_mobilidad_tobillo = $request->input('categoria_mobilidad_tobillo');
        $examination->evaluacion_sentadillas = $request->input('evaluacion_sentadillas');
        $examination->evaluacion_activa_pierna = $request->input('evaluacion_activa_pierna');
        $examination->movilidad_hombros = $request->input('movilidad_hombros');

        $examination->save();
    }

    public function quitarExaminacionFisica($request) {
        $examination = $request->ExaminacionFisica;
        $examinationElem = PhysicalConditionExamination::find($id);
        $examinationElem->delete();
    }
}
