<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\AnthropogenicalExamination;
use App\Models\AnthropometricalExamination;
use App\Models\PhysicalConditionExamination;
use App\Models\PostureExamination;
use App\Models\Patient;

class Consultation extends Model
{
    use HasFactory;

    protected $fillable = [
        'id_paciente',
        'fecha_realizacion',
        'talla'
    ];

    public function anthropogenicalExamination() {
        return $this->hasOne(AnthropogenicalExamination::class, 'id_consulta');
    }

    public function anthropometricalExamination() {
        return $this->hasOne(AnthropometricalExamination::class, 'id_consulta');
    }

    public function physicalConditionExamination() {
        return $this->hasOne(PhysicalConditionExamination::class, 'id_consulta');
    }

    public function postureExamination() {
        return $this->hasOne(PostureExamination::class, 'id_consulta');
    }

    public function patient() {
        return $this->belongsTo(Patient::class, 'id_paciente');
    }

    public static function index() {
        return Consultation::orderBy('id')->paginate(10);
    }

    public static function agregarConsulta($request) {
        $consultation = new Consultation();

        $consultation->id_paciente = $request->input('id_paciente');
        $consultation->fecha_realizacion = $request->input('fecha_realizacion');
        $consultation->talla = $request->input('talla_paciente');
        #$consultation->peso = $request->input('peso_paciente');

        $consultation->save();

        return $consultation->id;
    }

    public static function quitarConsulta($request) {
        $consultation = $request->Consulta;
        $examinationElem = Consultation::find($id);
        $examinationElem->delete();
    }

    public function getNombrePaciente() {
        return $this->patient->nombre . ' ' . $this->patient->apellido;
    }

    public function getUltimaExaminacionRealizada() {
        $examinaciones = [
            $this->anthropogenicalExamination,
            $this->anthropometricalExamination,
            $this->physicalConditionExamination,
            $this->postureExamination
        ];

        $ultima_examinacion = $this->anthropogenicalExamination;
        $ultima_fecha = $ultima_examinacion->fecha_realizacion;

        foreach ($examinaciones as $examinacionElem) {
            if ($examinacionElem->fecha_realizacion > $ultima_fecha) {
                $ultima_examinacion = $examinacionElem;
            }
        }

        return $ultima_examinacion;
    }
}
