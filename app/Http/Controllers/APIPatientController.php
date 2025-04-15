<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Patient;
use App\Http\Resources\PatientResource;

class APIPatientController extends Controller
{
    public function index(){
        return PatientResource::collection(Patient::all());
    }
}
