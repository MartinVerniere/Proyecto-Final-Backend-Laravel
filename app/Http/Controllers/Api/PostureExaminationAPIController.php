<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Consultation;
use App\Http\Resources\PostureExaminationResource;
use App\Models\PostureExamination;
use App\Models\HeadExamination;
use App\Models\ShouldersExamination;
use App\Models\PelvisExamination;
use App\Models\KneeExamination;
use App\Models\FeetExamination;
use App\Models\PivotExamination;

class PostureExaminationAPIController extends Controller {
    
    public function showPostureExamination($id){
        return new PostureExaminationResource(PostureExamination::find($id));
    }

    public function storePostureExamination(Request $request){
        $request_postura=$request->merge(['observaciones' => "OBSERVACIONES"]);
        $validate = $this->validateNuevaExaminacionPostura($request_postura);

        if ($validate) {
            $consulta_asociada = Consultation::findorfail($request->id_consulta);
            if (!$consulta_asociada->postureExamination){   
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
            return response()->json(['error' => 'La consulta ya tenia una examinacion de postura asociada']); 
        }
        else return response()->json(['error' => $validate], 400);
    }

    private function validateNuevaExaminacionPostura(Request $request){
        $validated = $request->validate([
            'fecha_realizacion' => 'required|date',
            'plano_cabeza' => 'required|in:Adelantado,Neutro,Retrasado',
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
            'eje_anterior_pie' => 'required|in:Valgo,Neutro,Varo',
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