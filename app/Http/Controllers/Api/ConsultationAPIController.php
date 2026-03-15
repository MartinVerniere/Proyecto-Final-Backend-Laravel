<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Consultation;
use App\Models\AnthropogenicalExamination;
use App\Models\AnthropometricalExamination;
use App\Models\PhysicalConditionExamination;
use App\Models\PostureExamination;
use App\Models\HeadExamination;
use App\Models\ShouldersExamination;
use App\Models\PelvisExamination;
use App\Models\KneeExamination;
use App\Models\FeetExamination;
use App\Models\PivotExamination;
use App\Http\Resources\ConsultationResource;
use App\Http\Resources\ConsultationCollection;

class ConsultationAPIController extends Controller
{
    public function index(){
		$consultations = Consultation::all();
		return new ConsultationCollection($consultations);
    }

    public function indexByPatient($id_paciente) {
		$consultationsByPatient = Consultation::where('id_paciente', $id_paciente)->get();
        return new ConsultationCollection($consultationsByPatient);
    }

    public function show($id) {
        return new ConsultationResource(Consultation::find($id));
    }

    public function store(Request $request) {
        $validatedConsultation = $this->validateNuevaConsulta($request);
    
        if ($validatedConsultation) {
            $ultima_consulta_id = Consultation::agregarConsulta($request);
        
            return response()->json([
                'message' => 'Consulta creada correctamente',
                'new_consult_id' => $ultima_consulta_id
            ], 200);
        }
        else {
            return response()->json(['error' => $validatedConsultation], 400);
        }
    }

    private function validateNuevaConsulta(Request $request) {
        $validated = $request->validate([
            'id_paciente' => 'required|exists:patients,id',
            'fecha_realizacion' => 'required|date',
            'talla_paciente' => 'required|numeric',
			'talla_paciente_sentado' => 'required|numeric',
            'peso_paciente' => 'required|numeric',
			'presion_arterial_paciente' => 'required|numeric',
            'deporte' => 'sometimes|string',
            'horas_gimnasio' => 'sometimes|integer',
            'dias_gimnasio' => 'sometimes|integer',
            'horas_semana_gimnasio' => 'sometimes|integer',
            'horas_entrenamiento' => 'sometimes|integer',
            'dias_entrenamiento' => 'sometimes|integer',
            'horas_semana_entrenamiento' => 'sometimes|integer',
            'club' => 'sometimes|string',
            'posicion' => 'sometimes|string',
            'antecedentes_personales' => 'sometimes|string|max:65535',
            'antecedentes_familiares' => 'sometimes|string|max:65535',
            'antecedentes_lesiones' => 'sometimes|string|max:65535',
            'estudios_laboratorio' => 'sometimes|string|max:65535',
            'observaciones_estudios_laboratorio' => 'sometimes|string',
            'estudios_cardiologicos' => 'sometimes|string|max:65535',
            'observaciones_estudios_cardiologicos' => 'sometimes|string',
            'desayuna' => 'sometimes|boolean',
            'almuerza' => 'sometimes|boolean',
            'merienda' => 'sometimes|boolean',
            'cena' => 'sometimes|boolean',
            'hidratacion' => 'sometimes|numeric',
            'observaciones_alimentacion' => 'sometimes|string|max:65535',
            'anotaciones' => 'sometimes|string|max:65535',
        ]);
        return $validated;
    }
}
