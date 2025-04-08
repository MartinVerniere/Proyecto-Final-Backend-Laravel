<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\AntropogenicalExamination;
use App\Models\AnthropometricalExamination;
use App\Models\FisicalConditionExamination;
use App\Models\Patient;


class Examination extends Model
{
    use HasFactory;

    protected $fillable = [
        'id_paciente',
        'fecha_realizacion',
        'talla'
    ];

    public function antropogenicalExaminations() {
        return $this->hasMany(AntropogenicalExamination::class);
    }

    public function anthropometricalExaminations() {
        return $this->hasMany(AnthropometricalExamination::class);
    }

    public function fisicalConditionExamination() {
        return $this->hasMany(FisicalConditionExamination::class);
    }

    public function patient() {
        return $this->belongsTo(Patient::class);
    }



    public function index() {
        return Examination::orderBy('id')->paginate(10);
    }

    public function agregarExaminacion($request) {
        $examination = new Examination();

        $examination->id_paciente = $request->input('id_paciente');
        $examination->fecha_realizacion = $request->input('fecha_realizacion');
        $examination->talla = $request->input('talla');

        $examination->save();
    }

    public function quitarExaminacion($request) {
        $examination = $request->Examinacion;
        $examinationElem = Examination::find($id);
        $examinationElem->delete();
    }
}
