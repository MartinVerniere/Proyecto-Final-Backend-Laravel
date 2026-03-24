<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\PhysicalConditionExamination;

class PhysicalConditionExaminationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index() {
        $examinaciones_fisicas = PhysicalConditionExamination::all();
        return view('examinations.physical.index', compact('examinaciones_fisicas'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(){}

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request) {
        return PhysicalConditionExamination::añadirExaminacionFisica($request);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id) {
		$examination = PhysicalConditionExamination::find($id);
        return view('examinations.physical.show', compact('examination'));
	}

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id){
		$examination = PhysicalConditionExamination::find($id);
		return view('examinations.physical.edit', compact('examination'));
	}

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id_examination){
		PhysicalConditionExamination::actualizarExaminacionFisica($request, $id_examination);
		return redirect()
			->route('consultations.index')
			->with('success', 'Examinación actualizada correctamente');
	}

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id_examination){
		PhysicalConditionExamination::quitarExaminacionFisica($id_examination);
		return redirect()
			->route('consultations.index')
			->with('success', 'Examinación eliminada correctamente');
	}
}
