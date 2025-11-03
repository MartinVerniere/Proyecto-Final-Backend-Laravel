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
		// dd([
		// 	'has_file_imagen_cabeza' => $request->hasFile('imagen_cabeza'),
		// 	'all_files' => $request->allFiles(),
		// 	'all_inputs' => $request->all(),
		// ]);

        $validate = $this->validateNuevaExaminacionPostura($request);
		if (!$validate) return response()->json(['error' => $validate], 400);

		$consulta_asociada = Consultation::findorfail($request->id_consulta);
		if ($consulta_asociada->postureExamination) return response()->json(['error' => 'La consulta ya tenia una examinacion de postura asociada']);
		
		$id_examinacion_postura = PostureExamination::añadirExaminacionPostura($request);

		HeadExamination::añadirExaminacionCabeza($this->createRequestExaminacionCabeza($request, $id_examinacion_postura));
		ShouldersExamination::añadirExaminacionHombrosEscapular($this->createRequestExaminacionHombros($request, $id_examinacion_postura));
		PelvisExamination::añadirExaminacionPelvis($this->createRequestExaminacionPelvis($request, $id_examinacion_postura));
		KneeExamination::añadirExaminacionRodilla($this->createRequestExaminacionRodilla($request, $id_examinacion_postura));
		FeetExamination::añadirExaminacionPies($this->createRequestExaminacionPies($request, $id_examinacion_postura));
		PivotExamination::añadirExaminacionPivot($this->createRequestExaminacionPivot($request, $id_examinacion_postura));

		return response()->json([
			'message' => 'Examen postural creado correctamente',
			'image_head_sent' => $request->file('imagen_cabeza')->getClientOriginalName()
		], 200);
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
			// 'imagen_cabeza' => 'required|mimes:jpeg,png,jpg,gif|max:5120',
			// 'imagen_hombros' => 'required|mimes:jpeg,png,jpg,gif|max:5120',
			// 'imagen_pelvis' => 'required|mimes:jpeg,png,jpg,gif|max:5120',
			// 'imagen_rodilla' => 'required|mimes:jpeg,png,jpg,gif|max:5120',
			// 'imagen_pie' => 'required|mimes:jpeg,png,jpg,gif|max:5120',
			// 'imagen_pivot' => 'required|mimes:jpeg,png,jpg,gif|max:5120',
			'keypoints_cabeza' => 'required|string',
			'keypoints_hombros' => 'required|string',
			'keypoints_pelvis' => 'required|string',
			'keypoints_rodilla' => 'required|string',
			'keypoints_pie' => 'required|string',
			'keypoints_pivot' => 'required|string',
        ]);
        return $validated;
    }

	private function createRequestExaminacionCabeza(Request $request, int $id_examinacion_postura) {
		return new Request([
			'id_examinacion_postura' => $id_examinacion_postura,
			'plano' => $request->plano_cabeza,
			'inclinacion' => $request->inclinacion_cabeza,
			'mirada' => $request->mirada_cabeza,
			'caries' => $request->caries_cabeza,
			'oclusion' => $request->oclusion_cabeza,
			'imagen' => $request->file('imagen_cabeza'),
			'keypoints' => json_decode($request->keypoints_cabeza, true)				
		]);
	}

	private function createRequestExaminacionHombros(Request $request, int $id_examinacion_postura) {
		return new Request([
			'id_examinacion_postura' => $id_examinacion_postura,
			'inclinacion' => $request->inclinacion_hombros,
			'musculatura' => $request->musculatura_hombros,
			'escapula' => $request->escapula_hombros,
			'hombro' => $request->hombro_hombros,
			'triangulo_de_talle' => $request->triangulo_de_talle_hombros,
			'imagen' => $request->file('imagen_hombros'),
			'keypoints' => json_decode($request->keypoints_hombros, true)
		]);
	}

	private function createRequestExaminacionPelvis(Request $request, int $id_examinacion_postura) {
		return new Request([
			'id_examinacion_postura' => $id_examinacion_postura,
			'eias' => $request->eias_pelvis,
			'eips' => $request->eips_pelvis,
			'relacion' => $request->relacion_pelvis,
			'rotacion' => $request->rotacion_pelvis,
			'imagen' => $request->file('imagen_pelvis'),
			'keypoints' => json_decode($request->keypoints_pelvis, true),
		]);
	}

	private function createRequestExaminacionRodilla(Request $request, int $id_examinacion_postura) {
		return new Request([
			'id_examinacion_postura' => $id_examinacion_postura,
			'genu' => $request->genu_rodilla,
			'morfotipo_torsional' => $request->morfotipo_torsional_rodilla,
			'tipologia_rotulas' => $request->tipologia_rotulas_rodilla,
			'imagen' => $request->file('imagen_rodilla'),
			'keypoints' => json_decode($request->keypoints_rodilla, true)
		]);
	}

	private function createRequestExaminacionPies(Request $request, int $id_examinacion_postura) {
		return new Request([
			'id_examinacion_postura' => $id_examinacion_postura,
			'eje_posterior' => $request->eje_posterior_pie,
			'eje_anterior' => $request->eje_anterior_pie,
			'tipologia' => $request->tipologia_pie,
			'dedos_en_garra' => $request->dedos_en_garra_pie,
			'imagen' => $request->file('imagen_pie'),
			'keypoints' => json_decode($request->keypoints_pie, true)
		]);
	}

	private function createRequestExaminacionPivot(Request $request, int $id_examinacion_postura) {
		return new Request([
			'id_examinacion_postura' => $id_examinacion_postura,
			'cervical_C4_C5' => $request->cervical_C4_C5_pivot,
			'dorsal_D8' => $request->dorsal_D8_pivot,
			'lumbar_L3' => $request->lumbar_L3_pivot,
			'raquis_escoliotico' => $request->raquis_escoliotico_pivot,
			'raquis_rectificado' => $request->raquis_rectificado_pivot,
			'raquis_cifolordotico' => $request->raquis_cifolordotico_pivot,
			'imagen' => $request->file('imagen_pivot'),
			'keypoints' => json_decode($request->keypoints_pivot, true)
		]);
	}
}