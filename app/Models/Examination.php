<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\AnthropogenicalExamination;
use App\Models\AnthropometricalExamination;
use App\Models\PhysicalConditionExamination;
use App\Models\PostureExamination;
use App\Models\Patient;

class Examination extends Model
{
    use HasFactory;

    protected $fillable = [
        'id_paciente',
        'fecha_realizacion',
        'talla'
    ];

    public function anthropogenicalExamination() {
        return $this->hasOne(AnthropogenicalExamination::class, 'id_examinacion');
    }

    public function anthropometricalExamination() {
        return $this->hasOne(AnthropometricalExamination::class, 'id_examinacion');
    }

    public function physicalConditionExamination() {
        return $this->hasOne(PhysicalConditionExamination::class, 'id_examinacion');
    }

    public function postureExamination() {
        return $this->hasOne(PostureExamination::class, 'id_examinacion');
    }

    public function patient() {
        return $this->belongsTo(Patient::class, 'id_paciente');
    }

    public static function index() {
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

    public function getNombrePaciente() {
        return $this->patient->nombre . ' ' . $this->patient->apellido;
    }
}
