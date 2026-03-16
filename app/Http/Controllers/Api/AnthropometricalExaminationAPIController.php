<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Consultation;
use App\Http\Resources\AnthropometricalExaminationResource;
use App\Models\AnthropometricalExamination;

class AnthropometricalExaminationAPIController extends Controller {

    public function showAnthropometricalExamination($id){
        return new AnthropometricalExaminationResource(AnthropometricalExamination::find($id));
    }

    public function storeAnthropometricalExamination(Request $request){
        $validated = $this->validateNuevaExaminacionAntropometrica($request);
        if ($validated) {
            $consulta_asociada = Consultation::findorfail($request->id_consulta);
            if (!$consulta_asociada->anthropometricalExamination){
                AnthropometricalExamination::añadirExaminacionAntropometrica($request);
                return response()->json(['message' => 'Examen antropometrico creado correctamente'], 200);
            }
            return response()->json(['error' => 'La consulta ya tenia una examinacion antropometrica asociada']);
        }
        else return response()->json(['error' => $validated], 400);
    }
    
    private function validateNuevaExaminacionAntropometrica(Request $request){
        $validated = $request->validate([
            'id_consulta' => 'required|exists:consultations,id',
            'fecha_realizacion' => 'required|date',
            'talla_paciente' => 'required|numeric',
			'talla_paciente_sentado' => 'required|numeric',
            'peso_paciente' => 'required|numeric',
			'presion_arterial_maxima_paciente' => 'required|numeric',
			'presion_arterial_minima_paciente' => 'required|numeric',
            'pliegues_triceps' => 'required|numeric',
            'pliegues_subescapular' => 'required|numeric',
            'pliegues_supraespinal' => 'required|numeric',
            'pliegues_abdominal' => 'required|numeric',
            'pliegues_muslo' => 'required|numeric',
            'pliegues_pantorrilla' => 'required|numeric',
            'perimetro_brazo_relajado' => 'required|numeric',
            'perimetro_brazo_flexionado' => 'required|numeric',
            'perimetro_cintura_minima' => 'required|numeric',
            'perimetro_cadera' => 'required|numeric',
            'perimetro_muslo' => 'required|numeric',
            'perimetro_pantorrilla' => 'required|numeric',
            'valor_indice_cintura_cadera' => 'required|numeric',
            'categoria_indice_cintura_cadera' => 'required|in:Bajo,Moderado,Alto,Muy alto',
            'valor_indice_masa_grasa' => 'required|numeric',
            'categoria_indice_masa_grasa' => 'required|in:Muy bajo,Bajo,Medio,Alto,Muy alto',
            'valor_indice_masa_muscular' => 'required|numeric',
            'categoria_indice_masa_muscular' => 'required|in:Bajo,Moderado,Alto',
            'suma_pliegues' => 'required|numeric',
        ]);
        return $validated;
    }
}