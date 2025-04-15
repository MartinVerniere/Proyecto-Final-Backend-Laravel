<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Examination;

class ExaminationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $examinaciones = Examination::index();
        return view('examinaciones.index', compact('examinaciones'));
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
        return Examination::añadirExaminacion($request);
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
        $examinacion = Examination::find($id);
        $examinacionFisica = $examinacion->physicalConditionExamination;
        return view('examinacionesFisicas.show', compact('examinacionFisica'));
    }

    public function examinacionAntropogenicaAsociada($id){
        $examinacion = Examination::find($id);
        $examinacionAntropogenica = $examinacion->anthropogenicalExamination;
        return view('examinacionesAntropogenicas.show', compact('examinacionAntropogenica'));
    }

    public function examinacionAntropometricaAsociada($id){
        $examinacion = Examination::find($id);
        $examinacionAntropometrica = $examinacion->anthropometricalExamination;
        return view('examinacionesAntropometricas.show', compact('examinacionAntropometrica'));
    }

    public function examinacionPosturaAsociada($id){
        $examinacion = Examination::find($id);
        $examinacionPostura = $examinacion->postureExamination;
        return view('examinacionesPostura.show', compact('examinacionPostura'));
    }
}
