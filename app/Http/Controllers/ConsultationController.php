<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Consultation;

class ConsultationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index() {
        $consultas = Consultation::all();
        return view('consultations.index', compact('consultas'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create() {}

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request) {
        Consultation::añadirConsulta($request);
		return redirect()
			->route('consultations.index')
			->with('success', 'Consulta añadida correctamente');
    }

    /**
     * Display the specified resource.
     */
    public function show(Consultation $consultation) {
        return view('consultations.show', compact('consultation'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Consultation $consultation) {
        return view('consultations.edit', compact('consultation'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id) {
		Consultation::actualizarConsulta($request, $id);
		return redirect()
			->route('consultations.index')
			->with('success', 'Consulta actualizada correctamente');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id) {
		Consultation::quitarConsulta($id);
		return redirect()
			->route('consultations.index')
			->with('success', 'Consulta eliminada correctamente');
    }
}
