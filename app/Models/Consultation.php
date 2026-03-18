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
        'talla',
		'talla_sentado',
        'peso',
		'presion_arterial_maxima',
		'presion_arterial_minima',
        'deporte',
        'horas_gimnasio',
        'dias_gimnasio',
        'horas_semana_gimnasio',
        'horas_entrenamiento',
        'dias_entrenamiento',
        'horas_semana_entrenamiento',
        'club',
        'posicion',
        'antecedentes_personales',
        'antecedentes_familiares',
        'antecedentes_lesiones',
        'estudios_laboratorio',
        'observaciones_estudios_laboratorio',
        'estudios_cardiologicos',
        'observaciones_estudios_cardiologicos',
        'desayuna',
        'almuerza',
        'merienda',
        'cena',
        'hidratacion',
		'observaciones_alimentacion',
        'anotaciones',
    ];

	protected $casts = [
		'desayuna' => 'boolean',
		'almuerza' => 'boolean',
		'merienda' => 'boolean',
		'cena' => 'boolean',
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
		$consultation->talla_sentado = $request->input('talla_paciente_sentado');
        $consultation->peso = $request->input('peso_paciente');
		$consultation->presion_arterial_maxima = $request->input('presion_arterial_maxima_paciente');
		$consultation->presion_arterial_minima = $request->input('presion_arterial_minima_paciente');

        $consultation->deporte = $request->input('deporte', null);
        $consultation->horas_gimnasio = $request->input('horas_gimnasio', null);
        $consultation->dias_gimnasio = $request->input('dias_gimnasio', null);
        $consultation->horas_semana_gimnasio = $request->input('horas_semana_gimnasio', null);
        $consultation->horas_entrenamiento = $request->input('horas_entrenamiento', null);
        $consultation->dias_entrenamiento = $request->input('dias_entrenamiento', null);
        $consultation->horas_semana_entrenamiento = $request->input('horas_semana_entrenamiento', null);
        $consultation->club = $request->input('club', null);
        $consultation->posicion = $request->input('posicion', null);
        $consultation->antecedentes_personales = $request->input('antecedentes_personales', null);
        $consultation->antecedentes_familiares = $request->input('antecedentes_familiares', null);
        $consultation->antecedentes_lesiones = $request->input('antecedentes_lesiones', null);
        $consultation->estudios_laboratorio = $request->input('estudios_laboratorio', null);
        $consultation->observaciones_estudios_laboratorio = $request->input('observaciones_estudios_laboratorio', null);
        $consultation->estudios_cardiologicos = $request->input('estudios_cardiologicos', null);
        $consultation->observaciones_estudios_cardiologicos = $request->input('observaciones_estudios_cardiologicos', null);
        $consultation->desayuna = $request->input('desayuna', null);
        $consultation->almuerza = $request->input('almuerza', null);
        $consultation->merienda = $request->input('merienda', null);
        $consultation->cena = $request->input('cena', null);
        $consultation->hidratacion = $request->input('hidratacion', null);
		$consultation->observaciones_alimentacion = $request->input('observaciones_alimentacion', null);
        $consultation->anotaciones = $request->input('anotaciones', null);

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

    public function getFechaUltimaExaminacionRealizada() {
        $examinaciones = array_filter([ //Filtrar los elementos null
            $this->anthropogenicalExamination,
            $this->anthropometricalExamination,
            $this->physicalConditionExamination,
            $this->postureExamination
        ]);

        $ultima_fecha = $this->fecha_realizacion;

        foreach ($examinaciones as $examinacionElem) {
            if ($examinacionElem->fecha_realizacion > $ultima_fecha) {
                $ultima_fecha = $examinacionElem->fecha_realizacion;
            }
        }

        return $ultima_fecha;
    }
}
