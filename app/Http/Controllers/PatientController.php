<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Patient;

class PatientController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pacientes = Patient::all();
        return view('patients.index', compact('pacientes'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(){
		return view('patients.create');
	}

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
		Patient::añadirPaciente($request);
		return redirect()
			->route('patients.index')
			->with('success', 'Paciente añadido correctamente');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id){}

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Patient $patient){
		return view('patients.edit', compact('patient'));
	}

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id) {
		Patient::actualizarPaciente($request, $id);
		return redirect()
			->route('patients.index')
			->with('success', 'Paciente actualizado correctamente');
	}

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id){
		Patient::quitarPaciente($id);
		return redirect()
			->route('patients.index')
			->with('success', 'Paciente eliminado correctamente');
	}

    public function consultations(Patient $patient){
		$consultas = $patient->consultations()
			->orderBy('id', 'desc')
			->get();
			
        return view('consultations.index', compact('consultas'));
    }
}
