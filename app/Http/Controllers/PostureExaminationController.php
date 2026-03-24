<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\PostureExamination;

class PostureExaminationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index() {
        $examinaciones_postura = PostureExamination::all();
        return view('examinations.posture.index', compact('examinaciones_postura'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(){}

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request) {
        $nueva_examinacion_postura_id = PostureExamination::añadirExaminacionPostura($request);
        return $nueva_examinacion_postura_id;
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id) {
		$examination = PostureExamination::find($id);

		$imagenes = [
			[
				'title' => 'Frontal',
				'img' => $examination->imagen_frontal,
				'kp'  => $this->parseKeypointsArray($examination->keypoints_frontal),
			],
			[
				'title' => 'Lateral derecha',
				'img' => $examination->imagen_lateral_derecha,
				'kp'  => $this->parseKeypointsArray($examination->keypoints_lateral_derecha),
			],
			[
				'title' => 'Lateral izquierda',
				'img' => $examination->imagen_lateral_izquierda,
				'kp'  => $this->parseKeypointsArray($examination->keypoints_lateral_izquierda),
			],
			[
				'title' => 'Posterior',
				'img' => $examination->imagen_trasera,
				'kp'  => $this->parseKeypointsArray($examination->keypoints_trasera),
			],
		];

        return view('examinations.posture.show', compact('examination', 'imagenes'));
	}

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id) {
		$examination = PostureExamination::find($id);

		$imagenes = [
			[
				'title' => 'Frontal',
				'img' => $examination->imagen_frontal,
				'kp'  => $this->parseKeypointsArray($examination->keypoints_frontal),
			],
			[
				'title' => 'Lateral derecha',
				'img' => $examination->imagen_lateral_derecha,
				'kp'  => $this->parseKeypointsArray($examination->keypoints_lateral_derecha),
			],
			[
				'title' => 'Lateral izquierda',
				'img' => $examination->imagen_lateral_izquierda,
				'kp'  => $this->parseKeypointsArray($examination->keypoints_lateral_izquierda),
			],
			[
				'title' => 'Posterior',
				'img' => $examination->imagen_trasera,
				'kp'  => $this->parseKeypointsArray($examination->keypoints_trasera),
			],
		];

		return view('examinations.posture.edit', compact('examination', 'imagenes'));
	}

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id_examination) {
		PostureExamination::actualizarExaminacionPostura($request, $id_examination);
		return redirect()
			->route('consultations.index')
			->with('success', 'Examinación actualizada correctamente');
	}

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id_examination){
		PostureExamination::quitarExaminacionPostura($id_examination);
		return redirect()
			->route('consultations.index')
			->with('success', 'Examinación eliminada correctamente');
	}

	private function parseKeypointsArray($keypoints) {
		if (is_string($keypoints)) 
			$decoded_keypoints = json_decode($keypoints, true);
	
		if (!is_array($decoded_keypoints)) return [];
	
		$parsed_keypoints = [];
	
		foreach ($decoded_keypoints as $kp) {
			if (isset($kp['name'], $kp['x'], $kp['y'])) {
				$parsed_keypoints[$kp['name']] = [
					'x' => $kp['x'],
					'y' => $kp['y'],
				];
			}
		}
	
		return $parsed_keypoints;
	}
}
