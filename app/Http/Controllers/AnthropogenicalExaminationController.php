<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\AnthropogenicalExamination;

class AnthropogenicalExaminationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index() {
        $examinaciones_antropogenicas = AnthropogenicalExamination::all();
        return view('examinations.anthropogenical.index', compact('examinaciones_antropogenicas'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(){}

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request) {
        return AnthropogenicalExamination::añadirExaminacionAntropogenica($request);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id) {
		$examination = AnthropogenicalExamination::find($id);
        return view('examinations.anthropogenical.show', compact('examination'));
	}

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id) {
		$examination = AnthropogenicalExamination::find($id);
		return view('examinations.anthropogenical.edit', compact('examination'));
	}

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id_examination){
		AnthropogenicalExamination::actualizarExaminacionAntropogenica($request, $id_examination);
		return redirect()
			->route('consultations.index')
			->with('success', 'Examinación actualizada correctamente');
	}

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id_examination) {
		AnthropogenicalExamination::quitarExaminacionAntropogenica($id_examination);
		return redirect()
			->route('consultations.index')
			->with('success', 'Examinación eliminada correctamente');
	}
}
