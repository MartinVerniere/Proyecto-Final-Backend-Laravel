<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Examination;
use App\Http\Resources\ExaminationResource;

class APIExaminationController extends Controller
{
    public function index(){
        return ExaminationResource::collection(Examination::all());
    }

    public function indexByPatient($id_paciente) {
        return ExaminationResource::collection(Examination::where('id_paciente', $id_paciente)->get());
    }

    public function show($id) {
        return new ExaminationResource(Examination::find($id));
    }
}
