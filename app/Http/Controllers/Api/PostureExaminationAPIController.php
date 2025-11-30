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
use App\Models\PivotExamination;

class PostureExaminationAPIController extends Controller {
    
    public function showPostureExamination($id){
        return new PostureExaminationResource(PostureExamination::find($id));
    }

    public function storePostureExamination(Request $request){
		// dd([
		// 	'has_file_imagen_cabeza' => $request->hasFile('imagen_frontal'),
		// 	'all_files' => $request->allFiles(),
		// 	'all_inputs' => $request->all(),
		// ]);

        $validate = $this->validateNuevaExaminacionPostura($request);
		if (!$validate) return response()->json(['error' => $validate], 400);

		$consulta_asociada = Consultation::findorfail($request->id_consulta);
		if ($consulta_asociada->postureExamination) return response()->json(['error' => 'La consulta ya tenia una examinacion de postura asociada'], 500);
		
		$id_examinacion_postura = PostureExamination::añadirExaminacionPostura($request);

		try {
			HeadExamination::añadirExaminacionCabeza($this->createRequestExaminacionCabeza($request, $id_examinacion_postura));
			ShouldersExamination::añadirExaminacionHombrosEscapular($this->createRequestExaminacionHombros($request, $id_examinacion_postura));
			PelvisExamination::añadirExaminacionPelvis($this->createRequestExaminacionPelvis($request, $id_examinacion_postura));
			KneeExamination::añadirExaminacionRodilla($this->createRequestExaminacionRodilla($request, $id_examinacion_postura));
			PivotExamination::añadirExaminacionPivot($this->createRequestExaminacionPivot($request, $id_examinacion_postura));
		} catch (Exception $e) {
			$examination_postura = PostureExamination::find($id_examinacion_postura);
        	$examination_postura->delete();

			return response()->json([
				'error' => 'Error al agregar sub-examinaciones para la examinacion de postura',
				'errorMessage' => $e
			]);
		}

		return response()->json([
			'message' => 'Examen postural creado correctamente',
		], 200);
    }

    private function validateNuevaExaminacionPostura(Request $request){
        $validated = $request->validate([
            'fecha_realizacion' => 'required|date',
            'plano_cabeza' => 'required|in:Adelantado,Neutro,Retrasado',
            'inclinacion_cabeza' => 'required|in:SI,NO',
            'mirada_cabeza' => 'required|in:Inclinacion derecha,Normal,Inclinacion izquierda',
            'inclinacion_hombros' => 'required|in:Inclinacion derecha,Normal,Inclinacion izquierda',
            'escapula_hombros' => 'required|in:Rotacion medial,Rotacion lateral,Angulo inferior izquierdo,Angulo inferior derecho,Aladas,Alineadas',
            'hombro_hombros' => 'required|in:Antepulsion,Normal,Retropulsion',
            //'triangulo_de_talle_hombros' => 'required|in:Normal,Aumentado',
            'eias_pelvis' => 'required|in:Inclinacion izquierda,Normal,Inclinacion derecha',
            'eips_pelvis' => 'required|in:Inclinacion izquierda,Normal,Inclinacion derecha',
            'relacion_pelvis' => 'required|in:Anteversion,Neutra,Retroversion',
            'rotacion_pelvis' => 'required|in:Izquierda,Neutra,Derecha',
            'genu_rodilla' => 'required|in:Varo,Valgo,Normal',
			'genu_rodilla_b' => 'required|in:Recurbatum,Flexo,Normal',
            'cervical_C4_C5_pivot' => 'required|in:Hiperlordosis,Normal,Rectificado',
            'dorsal_D8_pivot' => 'required|in:Lordotico,Normal,Cifotico',
            'lumbar_L3_pivot' => 'required|in:Hiperlordosis,Normal,Rectificado',
            'raquis_pivot' => 'required|in:Escoliotico,Rectificado, Cifolordotico',
			'imagen_frontal' => 'required|mimes:jpeg,png,jpg,gif|max:5120',
			'imagen_lateral_derecha' => 'required|mimes:jpeg,png,jpg,gif|max:5120',
			'imagen_lateral_izquierda' => 'required|mimes:jpeg,png,jpg,gif|max:5120',
			'imagen_trasera' => 'required|mimes:jpeg,png,jpg,gif|max:5120',
			'keypoints_frontal' => 'required|string',
			'keypoints_lateral_derecha' => 'required|string',
			'keypoints_lateral_izquierda' => 'required|string',
			'keypoints_trasera' => 'required|string',
        ]);
        return $validated;
    }

	private function createRequestExaminacionCabeza(Request $request, int $id_examinacion_postura) {
		$newRequest = new Request([
			'id_examinacion_postura' => $id_examinacion_postura,
			'plano' => $request->plano_cabeza,
			'inclinacion' => $request->inclinacion_cabeza,
			'mirada' => $request->mirada_cabeza,			
		]);

		return $newRequest;
	}

	private function createRequestExaminacionHombros(Request $request, int $id_examinacion_postura) {
		$newRequest = new Request([
			'id_examinacion_postura' => $id_examinacion_postura,
			'inclinacion' => $request->inclinacion_hombros,
			'escapula' => $request->escapula_hombros,
			'hombro' => $request->hombro_hombros,
			//'triangulo_de_talle' => $request->triangulo_de_talle_hombros,
		]);

		return $newRequest;
	}

	private function createRequestExaminacionPelvis(Request $request, int $id_examinacion_postura) {
		$newRequest = new Request([
			'id_examinacion_postura' => $id_examinacion_postura,
			'eias' => $request->eias_pelvis,
			'eips' => $request->eips_pelvis,
			'relacion' => $request->relacion_pelvis,
			'rotacion' => $request->rotacion_pelvis,
		]);

		return $newRequest;
	}

	private function createRequestExaminacionRodilla(Request $request, int $id_examinacion_postura) {
		$newRequest = new Request([
			'id_examinacion_postura' => $id_examinacion_postura,
			'genu' => $request->genu_rodilla,
			'genu_b' => $request->genu_rodilla_b,
		]);

		return $newRequest;
	}

	private function createRequestExaminacionPivot(Request $request, int $id_examinacion_postura) {
		$newRequest = new Request([
			'id_examinacion_postura' => $id_examinacion_postura,
			'cervical_C4_C5' => $request->cervical_C4_C5_pivot,
			'dorsal_D8' => $request->dorsal_D8_pivot,
			'lumbar_L3' => $request->lumbar_L3_pivot,
			'raquis' => $request->raquis_pivot,
		]);

		return $newRequest;
	}
}