<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Resources\AnthropogenicalExaminationResource;
use App\Http\Resources\AnthropometricalExaminationResource;
use App\Http\Resources\PhysicalConditionExaminationResource;
use App\Http\Resources\PostureExaminationResource;
use App\Models\AnthropogenicalExamination;
use App\Models\AnthropometricalExamination;
use App\Models\PhysicalConditionExamination;
use App\Models\PostureExamination;

class APIExaminationsController extends Controller
{
    ## Ver Examinaciones
    public function showAnthropogenicalExamination($id){
        return new AnthropogenicalExaminationResource(AnthropogenicalExamination::find($id));
    }

    public function showAnthropometricalExamination($id){
        return new AnthropometricalExaminationResource(AnthropometricalExamination::find($id));
    }

    public function showPhysicalConditionExamination($id){
        return new PhysicalConditionExaminationResource(PhysicalConditionExamination::find($id));
    }

    public function showPostureExamination($id){
        return new PostureExaminationResource(PostureExamination::find($id));
    }

    # Crear Examinaciones
    public function storeAnthropogenicalExamination(Request $request){
        $validated = $this->validateNuevaExaminacionAntropogenica($request);
        if ($validated) {
            AnthropogenicalExamination::añadirExaminacionAntropogenica($request);
            return response()->json(['message' => 'Examen antropogenico creado correctamente'], 200);
        }
        else return response()->json(['error' => $validated], 400);
    }
        private function validateNuevaExaminacionAntropogenica(Request $request){
            $validated = $request->validate([
                'id_consulta' => 'required|exists:consultations,id',
                'fecha_realizacion' => 'required|date',
                'longitud_pierna' => 'required|float',
                'talla_padre' => 'required|float',
                'talla_madre' => 'required|float',
                'talla_adulta' => 'required|float',
                'talla_objetiva_genetica' => 'required|float',
                'talla_falta_crecer' => 'required|float',
                'valor_IRMI' => 'required|float', 
                'categoria_IRMI' => 'required|in:0,1,2',
                'valor_indice_cormico' => 'required|float',
                'categoria_indice_cormico' => 'required|in:Corto,Medio,Largo',
                'valor_indice_masa_corporal' => 'required|float',
                'categoria_indice_masa_corporal' => 'required|in:Peso insuficiente,Normopeso,Sobrepeso tipo I,Sobrepeso tipo II,Obesidad tipo I,Obesidad tipo II,Obesidad tipo III',
                'valor_estadio_tanner' => 'required|float',
                'categoria_estadio_tanner' => 'required|in:I,II,III,IV,V',
                'valor_indice_madurativo' => 'required|float',
                'valor_edad_phv' => 'required|float',
                'categoria_edad_phv' => 'required|in:Temprano,Normal,Tardio',
            ]);
            return $validated;
        }

    public function storeAnthropometricalExamination(Request $request){
        $validated = $this->validateNuevaExaminacionAntropometrica($request);
        if ($validated) {
            AnthropometricalExamination::añadirExaminacionAntropometrica($request);
            return response()->json(['message' => 'Examen antropometrico creado correctamente'], 200);
        }
        else return response()->json(['error' => $validated], 400);
    }
        private function validateNuevaExaminacionAntropometrica(Request $request){
            $validated = $request->validate([
                'id_consulta' => 'required|exists:consultations,id',
                'fecha_realizacion' => 'required|date',
                'pliegue_triceps' => 'required|integer',
                'pliegues_subescapular' => 'required|integer',
                'pliegues_supraespinal' => 'required|integer',
                'pliegues_abdominal' => 'required|integer',
                'pliegues_muslo' => 'required|integer',
                'pliegues_pantorrilla' => 'required|integer',
                'perimetro_brazo_relajado' => 'required|float',
                'perimetro_brazo_flexionado' => 'required|float',
                'perimetro_cintura_minima' => 'required|float',
                'perimetro_cadera' => 'required|float',
                'perimetro_muslo' => 'required|float',
                'perimetro_pantorrilla' => 'required|float',
                'valor_indice_cintura_cadera' => 'required|float',
                'categoria_indice_cintura_cadera' => 'required|in:Bajo,Moderado,Alto,Muy alto',
                'valor_indice_masa_grasa' => 'required|float',
                'categoria_indice_masa_grasa' => 'required|in:Muy bajo,Bajo,Medio,Alto,Muy alto',
                'valor_indice_masa_muscular' => 'required|float',
                'categoria_indice_masa_muscular' => 'required|in:Bajo,Moderado,Alto',
                'suma_pliegues' => 'required|integer',
            ]);
            return $validated;
        }

    public function storePhysicalConditionExamination(Request $request){
        $validated = $this->validateNuevaExaminacionFisica($request);
        if ($validated) return PhysicalConditionExamination::añadirExaminacionFisica($request);
        else return response()->json(['error' => $validated], 400);
    }
        private function validateNuevaExaminacionFisica(Request $request){
            $validated = $request->validate([
                'id_consulta' => 'required|exists:consultations,id',
                'fecha_realizacion' => 'required|date',
                'valor_fuerza_presion_manual' => 'required|float',
                'categoria_fuerza_presion_manual' => 'required|in:Muy bajo,Bajo,Medio,Alto,Muy alto',
                'valor_fuerza_explosiva' => 'required|float',
                'categoria_fuerza_explosiva' => 'required|in:Muy bajo,Bajo,Medio,Alto,Muy alto',
                'valor_mobilidad_tobillo' => 'required|float',
                'categoria_mobilidad_tobillo' => 'required|in:Rigidez,Bien',
            ]);
            return $validated;
        }
}
