<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Consultation;
use App\Models\HeadExamination;
use App\Models\ShouldersExamination;
use App\Models\PelvisExamination;
use App\Models\KneeExamination;
use App\Models\FeetExamination;
use App\Models\PivotExamination;

class PostureExamination extends Model
{
    use HasFactory;

    protected $fillable = [
        'id_consulta',
        'fecha_realizacion',
        'observations',
    ];

    public function consultation() {
        return $this->belongsTo(Consultation::class, 'id_consulta');
    }

    public function analisisCabeza() {
        return $this->hasOne(HeadExamination::class, 'id_examinacion_postura', 'id');
    }

    public function analisisHombrosEscapular() {
        return $this->hasOne(ShouldersExamination::class, 'id_examinacion_postura', 'id');
    }

    public function analisisPelvis() {
        return $this->hasOne(PelvisExamination::class, 'id_examinacion_postura', 'id');
    }

    public function analisisRodilla() {
        return $this->hasOne(KneeExamination::class, 'id_examinacion_postura', 'id');
    }

    public function analisisPies() {
        return $this->hasOne(FeetExamination::class, 'id_examinacion_postura', 'id');
    }

    public function analisisPivot() {
        return $this->hasOne(PivotExamination::class, 'id_examinacion_postura', 'id');
    }

    public function añadirExaminacionPostura($request) {
        $examination = new PostureExamination();

        $examination->id_paciente = $request->input('id_paciente');
        $examination->fecha_realizacion = $request->input('fecha_realizacion');
        $examination->observations = $request->input('observaciones');

        $examination->save();
    }

    public function quitarExaminacionPostura($request) {
        $examination = $request->ExaminacionPostura;
        $examinationElem = PostureExamination::find($id);
        $examinationElem->delete();
    }

}
