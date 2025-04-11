<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\AntropogenicalExamination;
use App\Models\AnthropometricalExamination;
use App\Models\PhysicalConditionExamination;
use App\Models\Patient;

class Examination extends Model
{
    use HasFactory;

    protected $fillable = [
        'id_paciente',
        'fecha_realizacion',
        'talla'
    ];

    public function antropogenicalExamination() {
        return $this->hasOne(AntropogenicalExamination::class);
    }

    public function anthropometricalExamination() {
        return $this->hasOne(AnthropometricalExamination::class);
    }

    public function physicalConditionExamination() {
        return $this->hasOne(PhysicalConditionExamination::class);
    }

    public function patient() {
        return $this->belongsTo(Patient::class, 'id_paciente');
    }

    public static function index() {
        return Examination::orderByDesc('id')->paginate(10);
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
