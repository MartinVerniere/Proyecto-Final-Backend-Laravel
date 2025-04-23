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
    public function index()
    {
        $consultas = Consultation::index();
        return view('consultas.index', compact('consultas'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        return Consultation::añadirConsulta($request);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function examinacionFisicaAsociada($id){
        $consulta = Consultation::find($id);
        $examinacionFisica = $consulta->physicalConditionExamination;
        return view('examinacionesFisicas.show', compact('examinacionFisica'));
    }

    public function examinacionAntropogenicaAsociada($id){
        $consulta = Consultation::find($id);
        $examinacionAntropogenica = $consulta->anthropogenicalExamination;
        return view('examinacionesAntropogenicas.show', compact('examinacionAntropogenica'));
    }

    public function examinacionAntropometricaAsociada($id){
        $consulta = Consultation::find($id);
        $examinacionAntropometrica = $consulta->anthropometricalExamination;
        return view('examinacionesAntropometricas.show', compact('examinacionAntropometrica'));
    }

    public function examinacionPosturaAsociada($id){
        $consulta = Consultation::find($id);
        $examinacionPostura = $consulta->postureExamination;
        return view('examinacionesPostura.show', compact('examinacionPostura'));
    }
}
