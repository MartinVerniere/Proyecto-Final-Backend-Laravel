<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\MadurativeExamination;

class MadurativeExaminationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index() {
        $examinaciones_madurativas = MadurativeExamination::all();
        return view('examinations.madurative.index', compact('examinaciones_madurativas'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(){}

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request) {
        return MadurativeExamination::añadirExaminacionMadurativa($request);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id) {
		$examination = MadurativeExamination::find($id);
        return view('examinations.madurative.show', compact('examination'));
	}

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id) {
		$examination = MadurativeExamination::find($id);
		return view('examinations.madurative.edit', compact('examination'));
	}

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id_examination){
		MadurativeExamination::actualizarExaminacionMadurativa($request, $id_examination);
		return redirect()
			->route('consultations.index')
			->with('success', 'Examinación actualizada correctamente');
	}

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id_examination) {
		MadurativeExamination::quitarExaminacionMadurativa($id_examination);
		return redirect()
			->route('consultations.index')
			->with('success', 'Examinación eliminada correctamente');
	}
}
