<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Consultation;
use App\Http\Resources\PhysicalConditionExaminationResource;
use App\Models\PhysicalConditionExamination;

class PhysicalConditionExaminationAPIController extends Controller {

    public function showPhysicalConditionExamination($id){
        return new PhysicalConditionExaminationResource(PhysicalConditionExamination::find($id));
    }

    public function storePhysicalConditionExamination(Request $request){
        $validated = $this->validateNuevaExaminacionFisica($request);
        if ($validated) {
            $consulta_asociada = Consultation::findorfail($request->id_consulta);
            if (!$consulta_asociada->physicalConditionExamination){            
                PhysicalConditionExamination::añadirExaminacionFisica($request);
                return response()->json(['message' => 'Examen condicion fisica creado correctamente'], 200);
            }
            return response()->json(['error' => 'La consulta ya tenia una examinacion fisica asociada']);            
        }
        else return response()->json(['error' => $validated], 400);
    }

    private function validateNuevaExaminacionFisica(Request $request){
        $validated = $request->validate([
            'id_consulta' => 'required|exists:consultations,id',
            'fecha_realizacion' => 'required|date',
			'talla_paciente' => 'required|numeric',
            'peso_paciente' => 'required|numeric',
            'valor_fuerza_presion_manual' => 'required|numeric',
            'categoria_fuerza_presion_manual' => 'required|in:Muy bajo,Bajo,Medio,Alto,Muy alto',
            'valor_fuerza_explosiva' => 'required|numeric',
            'categoria_fuerza_explosiva' => 'required|in:Muy bajo,Bajo,Medio,Alto,Muy alto',
            'valor_mobilidad_tobillo' => 'required|numeric',
            'categoria_mobilidad_tobillo' => 'required|in:Rigidez,Bien',
        ]);
        return $validated;
    }

}