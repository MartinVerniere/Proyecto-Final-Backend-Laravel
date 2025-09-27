<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Patient;
use App\Http\Resources\PatientResource;

class PatientAPIController extends Controller
{
    public function index(){
        return PatientResource::collection(Patient::all());
    }

    public function show($id){
        return new PatientResource(Patient::find($id));
    }

    public function store(Request $request){
        $validated = $this->validatePatientInfo($request);
        
        if ($validated) {
            Patient::añadirPaciente($request);
            return response()->json(['message' => 'Paciente creado correctamente'], 200);
        }
        else {
            return response()->json(['error' => $validated], 400);
        }
    }

    private function validatePatientInfo(Request $request){
        $validated = $request->validate([
            'nombre' => 'required|string',
            'apellido' => 'required|string',
            'genero' => 'required|in:MASCULINO,FEMENINO',
            'dni' => 'required|numeric|digits_between:8,20',
            'fecha_nacimiento' => 'required|date',
        ]);
        return $validated;
    }
}
