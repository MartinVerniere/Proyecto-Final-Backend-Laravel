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
use App\Models\HeadExamination;
use App\Models\ShouldersExamination;
use App\Models\PelvisExamination;
use App\Models\KneeExamination;
use App\Models\FeetExamination;
use App\Models\PivotExamination;

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
        $request_postura=$request->merge(['observaciones' => "OBSERVACIONES"]);
        $validate = $this->validateNuevaExaminacionPostura($request_postura);

        if ($validate) {
            $id_examinacion_postura = PostureExamination::añadirExaminacionPostura($request);


            $request_cabeza = new Request([
                'id_examinacion_postura' => $id_examinacion_postura,
                'plano' => $request_postura->plano_cabeza,
                'inclinacion' => $request_postura->inclinacion_cabeza,
                'mirada' => $request_postura->mirada_cabeza,
                'caries' => $request_postura->caries_cabeza,
                'oclusion' => $request_postura->oclusion_cabeza,
            ]);

            $request_hombros = new Request([
                'id_examinacion_postura' => $id_examinacion_postura,
                'inclinacion' => $request_postura->inclinacion_hombros,
                'musculatura' => $request_postura->musculatura_hombros,
                'escapula' => $request_postura->escapula_hombros,
                'hombro' => $request_postura->hombro_hombros,
                'triangulo_de_talle' => $request_postura->triangulo_de_talle_hombros,
            ]);

            $request_pelvis = new Request([
                'id_examinacion_postura' => $id_examinacion_postura,
                'eias' => $request_postura->eias_pelvis,
                'eips' => $request_postura->eips_pelvis,
                'relacion' => $request_postura->relacion_pelvis,
                'rotacion' => $request_postura->rotacion_pelvis,
            ]);

            $request_rodilla = new Request([
                'id_examinacion_postura' => $id_examinacion_postura,
                'genu' => $request_postura->genu_rodilla,
                'morfotipo_torsional' => $request_postura->morfotipo_torsional_rodilla,
                'tipologia_rotulas' => $request_postura->tipologia_rotulas_rodilla,
            ]);

            $request_pies = new Request([
                'id_examinacion_postura' => $id_examinacion_postura,
                'eje_posterior' => $request_postura->eje_posterior_pie,
                'eje_anterior' => $request_postura->eje_anterior_pie,
                'tipologia' => $request_postura->tipologia_pie,
                'dedos_en_garra' => $request_postura->dedos_en_garra_pie,
            ]);

            $request_pivot = new Request([
                'id_examinacion_postura' => $id_examinacion_postura,
                'cervical_C4_C5' => $request_postura->cervical_C4_C5_pivot,
                'dorsal_D8' => $request_postura->dorsal_D8_pivot,
                'lumbar_L3' => $request_postura->lumbar_L3_pivot,
                'raquis_escoliotico' => $request_postura->raquis_escoliotico_pivot,
                'raquis_rectificado' => $request_postura->raquis_rectificado_pivot,
                'raquis_cifolordotico' => $request_postura->raquis_cifolordotico_pivot,
            ]);

            HeadExamination::añadirExaminacionCabeza($request_cabeza);
            ShouldersExamination::añadirExaminacionHombrosEscapular($request_hombros);
            PelvisExamination::añadirExaminacionPelvis($request_pelvis);
            KneeExamination::añadirExaminacionRodilla($request_rodilla);
            FeetExamination::añadirExaminacionPies($request_pies);
            PivotExamination::añadirExaminacionPivot($request_pivot);

            return response()->json(['message' => 'Examen postural creado correctamente'], 200);
        }
        else return response()->json(['error' => $validate], 400);
    }
        private function validateNuevaExaminacionPostura(Request $request){
            $validated = $request->validate([
                'fecha_realizacion' => 'required|date',
                'plano_cabeza' => 'required|in:Adelantado,Neutro,Retrazado',
                'inclinacion_cabeza' => 'required|in:SI,NO',
                'mirada_cabeza' => 'required|in:Inclinacion derecha,Normal,Inclinacion izquierda',
                'caries_cabeza' => 'required|in:SI,NO',
                'oclusion_cabeza' => 'required|in:Bien,Mal',
                'inclinacion_hombros' => 'required|in:Inclinacion derecha,Normal,Inclinacion izquierda',
                'musculatura_hombros' => 'required|in:Hipertonica,Normal,Hipotonica',
                'escapula_hombros' => 'required|in:Rotacion medial,Rotacion lateral,Angulo inferior izquierdo,Angulo inferior derecho,Aladas,Alineadas',
                'hombro_hombros' => 'required|in:Antepulsion,Normal,Retropulsion',
                'triangulo_de_talle_hombros' => 'required|in:Normal,Aumentado',
                'eias_pelvis' => 'required|in:Inclinacion izquierda,Normal,Inclinacion derecha',
                'eips_pelvis' => 'required|in:Inclinacion izquierda,Normal,Inclinacion derecha',
                'relacion_pelvis' => 'required|in:Anteversion,Neutra,Retroversion',
                'rotacion_pelvis' => 'required|in:Izquierda,Neutra,Derecha',
                'genu_rodilla' => 'required|in:Varo,Valgo,Recurbatum,Flexo,Normal',
                'morfotipo_torsional_rodilla' => 'required|in:SI,NO',
                'tipologia_rotulas_rodilla' => 'required|in:Convexa,Normal,Divergente',
                'eje_posterior_pie' => 'required|in:Supinador,Neutro,Pronador',
                'eje_anterior_pie' => 'required|in:Valgo,Neutra,Varo',
                'tipologia_pie' => 'required|in:Egipcio,Griego,Romano',
                'dedos_en_garra_pie' => 'required|in:SI,NO',
                'cervical_C4_C5_pivot' => 'required|in:Hiperlordosis,Normal,Rectificado',
                'dorsal_D8_pivot' => 'required|in:Lordotico,Normal,Cifotico',
                'lumbar_L3_pivot' => 'required|in:Hiperlordosis,Normal,Rectificado',
                'raquis_escoliotico_pivot' => 'required|in:SI,NO',
                'raquis_rectificado_pivot' => 'required|in:SI,NO',
                'raquis_cifolordotico_pivot' => 'required|in:SI,NO',
            ]);
            return $validated;
        }
}
