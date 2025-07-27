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
                'talla_paciente' => 'required|numeric',
                'peso_paciente' => 'required|numeric',
                'longitud_pierna' => 'required|numeric',
                'talla_padre' => 'required|numeric',
                'talla_madre' => 'required|numeric',
                'talla_adulta' => 'required|numeric',
                'talla_objetiva_genetica' => 'required|numeric',
                'talla_falta_crecer' => 'required|numeric',
                'valor_IRMI' => 'required|numeric', 
                'categoria_IRMI' => 'required|in:0,1,2',
                'valor_indice_cormico' => 'required|numeric',
                'categoria_indice_cormico' => 'required|in:Corto,Medio,Largo',
                'valor_indice_masa_corporal' => 'required|numeric',
                'categoria_indice_masa_corporal' => 'required|in:Peso insuficiente,Normopeso,Sobrepeso tipo I,Sobrepeso tipo II,Obesidad tipo I,Obesidad tipo II,Obesidad tipo III',
                'valor_estadio_tanner' => 'required|numeric',
                'categoria_estadio_tanner' => 'required|in:I,II,III,IV,V',
                'valor_indice_madurativo' => 'required|numeric',
                'valor_edad_PHV' => 'required|numeric',
                'categoria_edad_PHV' => 'required|in:Temprano,Normal,Tardio',
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
                'talla_paciente' => 'required|numeric',
                'peso_paciente' => 'required|numeric',
                'pliegue_triceps' => 'required|numeric',
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

    public function storePhysicalConditionExamination(Request $request){
        $validated = $this->validateNuevaExaminacionFisica($request);
        if ($validated) {
            PhysicalConditionExamination::añadirExaminacionFisica($request);
            return response()->json(['message' => 'Examen condicion fisica creado correctamente'], 200);
        }
        else return response()->json(['error' => $validated], 400);
    }
        private function validateNuevaExaminacionFisica(Request $request){
            $validated = $request->validate([
                'id_consulta' => 'required|exists:consultations,id',
                'fecha_realizacion' => 'required|date',
                'valor_fuerza_presion_manual' => 'required|numeric',
                'categoria_fuerza_presion_manual' => 'required|in:Muy bajo,Bajo,Medio,Alto,Muy alto',
                'valor_fuerza_explosiva' => 'required|numeric',
                'categoria_fuerza_explosiva' => 'required|in:Muy bajo,Bajo,Medio,Alto,Muy alto',
                'valor_mobilidad_tobillo' => 'required|numeric',
                'categoria_mobilidad_tobillo' => 'required|in:Rigidez,Bien',
            ]);
            return $validated;
        }

    public function storePostureExamination(Request $request){
        $validate = $this->validateNuevaExaminacionPostura($request);
        if ($validate) {
            $id_examinacion_postura = PostureExamination::añadirExaminacionPostura($request);
            $request_con_id_examinacion_postura = $request->merge(['id_examinacion_postura' => $id_examinacion_postura]);

            HeadExamination::añadirExaminacionCabeza($request_con_id_examinacion_postura);
            ShouldersExamination::añadirExaminacionHombrosEscapular($request_con_id_examinacion_postura);
            PostureExamination::añadirExaminacionPostura($request_con_id_examinacion_postura);
            PelvisExamination::añadirExaminacionPelvis($request_con_id_examinacion_postura);
            KneeExamination::anadirExaminacionRodilla($request_con_id_examinacion_postura);
            FeetExamination::anadirExaminacionPies($request_con_id_examinacion_postura);
            PivotExamination::añadirExaminacionPivot($request_con_id_examinacion_postura);

            return response()->json(['message' => 'Examen postural creado correctamente'], 200);
        }
        else return response()->json(['error' => $validate], 400);
    }
        private function validateNuevaExaminacionPostura(Request $request){
            $validated = $request->validate([
                'fecha_realizacion' => 'required|date',
                'plano' => 'required|in:Adelantado,Neutro,Retrazado',
                'inclinacion' => 'required|in:SI,NO',
                'mirada' => 'required|in:Inclinacion derecha,Normal,Inclinacion izquierda',
                'caries' => 'required|in:SI,NO',
                'oclusion' => 'required|in:Bien,Mal',
                'inclinacion' => 'required|in:Inclinacion derecha,Normal,Inclinacion izquierda',
                'musculatura' => 'required|in:Hipertonica,Normal,Hipotonica',
                'escapula' => 'required|in:Rotacion medial,Rotacion lateral,Angulo inferior izquierdo,Angulo inferior derecho,Aladas,Alineadas',
                'hombro' => 'required|in:Antepulsion,Normal,Retropulsion',
                'triangulo_de_talle' => 'required|in:Normal,Aumentado',
                'eias' => 'required|in:Inclinacion izquierda,Normal,Inclinacion derecha',
                'eips' => 'required|in:Inclinacion izquierda,Normal,Inclinacion derecha',
                'relacion' => 'required|in:Anteversion,Neutra,Retroversion',
                'rotacion' => 'required|in:Izquierda,Neutra,Derecha',
                'genu' => 'required|in:Varo,Valgo,Recurbatum,Flexo,Normal',
                'morfotipo_torsional' => 'required|in:SI,NO',
                'tipologia_rotulas' => 'required|in:Convexa,Normal,Divergente',
                'eje_posterior' => 'required|in:Supinador,Neutro,Pronador',
                'eje_anterior' => 'required|in:Valgo,Neutra,Varo',
                'tipologia' => 'required|in:Egipcio,Griego,Romano',
                'dedos_en_garra' => 'required|in:SI,NO',
                'cervical_C4_C5' => 'required|in:Hiperlordosis,Normal,Rectificado',
                'dorsal_D8' => 'required|in:Lordotico,Normal,Cifotico',
                'lumbar_L3' => 'required|in:Hiperlordosis,Normal,Rectificado',
                'raquis_escoliotico' => 'required|in:SI,NO',
                'raquis_rectificado' => 'required|in:SI,NO',
                'raquis_cifolordotico' => 'required|in:SI,NO',
            ]);
            return $validated;
        }
}
