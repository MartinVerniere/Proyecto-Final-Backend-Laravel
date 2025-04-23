<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Consultation;
use App\Http\Resources\ConsultationResource;

class APIConsultationController extends Controller
{
    public function index(){
        return ConsultationResource::collection(Consultation::all());
    }

    public function indexByPatient($id_paciente) {
        return ConsultationResource::collection(Consultation::where('id_paciente', $id_paciente)->get());
    }

    public function show($id) {
        return new ConsultationResource(Consultation::find($id));
    }
}
