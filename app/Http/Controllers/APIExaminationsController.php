<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Resources\AnthropogenicalExaminationResource;
use App\Http\Resources\AnthropometricalExaminationResource;
use App\Http\Resources\PhysicalConditionExaminationResource;
use App\Http\Resources\PostureExaminationResource;
use App\Models\AnthropogenicalExamination;
use App\Models\AnthropometricalExamination;
use App\Models\PhysicalConditionExamination;
use App\Models\PostureExamination;

class APIExaminationsController extends Controller
{
    public function showAnthropogenicalExamination($id){
        return new AnthropogenicalExaminationResource(AnthropogenicalExamination::find($id));
    }

    public function showAnthropometricalExamination($id){
        return new AnthropometricalExaminationResource(AnthropometricalExamination::find($id));
    }

    public function showPhysicalConditionExamination($id){
        return new PhysicalConditionExaminationResource(PhysicalConditionExamination::find($id));
    }

    public function showPostureExamination($id){
        return new PostureExaminationResource(PostureExamination::find($id));
    }
}
