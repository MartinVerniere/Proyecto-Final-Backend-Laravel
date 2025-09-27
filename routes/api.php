<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\PatientAPIController;
use App\Http\Controllers\Api\ConsultationAPIController;
use App\Http\Controllers\Api\AnthropogenicalExaminationAPIController;
use App\Http\Controllers\Api\AnthropometricalExaminationAPIController;
use App\Http\Controllers\Api\PhysicalConditionExaminationAPIController;
use App\Http\Controllers\Api\PostureExaminationAPIController;
use App\Http\Controllers\Auth\AuthControllerApi;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('/login', [AuthControllerApi::class, 'login']);
Route::post('/register', [AuthControllerApi::class, 'register']);

Route::middleware('auth:sanctum')->group(function () {
    Route::post('/logout', [AuthControllerApi::class, 'logout']);

    Route::get('consultas', [ConsultationAPIController::class, 'index']);
    Route::get('consultas/{id}', [ConsultationAPIController::class, 'show']);
    Route::post('consultas/crear', [ConsultationAPIController::class, 'store']);

    Route::get('pacientes', [PatientAPIController::class, 'index']);
    Route::get('pacientes/{id}', [PatientAPIController::class, 'show']);
    Route::get('pacientes/{id}/consultas', [ConsultationAPIController::class, 'indexByPatient']);
    Route::post('pacientes/crear', [PatientAPIController::class, 'store']);

    Route::get('examinaciones/examinacionAntropogenica/{id}', [AnthropogenicalExaminationControler::class, 'showAnthropogenicalExamination']);
    Route::get('examinaciones/examinacionAntropometrica/{id}', [AnthropometricalExaminationAPIController::class, 'showAnthropometricalExamination']);
    Route::get('examinaciones/examinacionFisica/{id}', [PhysicalConditionExaminationAPIController::class, 'showPhysicalConditionExamination']);
    Route::get('examinaciones/examinacionPostura/{id}', [PostureExaminationAPIController::class, 'showPostureExamination']);

    Route::post('examinaciones/examinacionAntropogenica/crear', [AnthropogenicalExaminationAPIController::class, 'storeAnthropogenicalExamination']);
    Route::post('examinaciones/examinacionAntropometrica/crear', [AnthropometricalExaminationAPIController::class, 'storeAnthropometricalExamination']);
    Route::post('examinaciones/examinacionCondicionFisica/crear', [PhysicalConditionExaminationAPIController::class, 'storePhysicalConditionExamination']);
    Route::post('examinaciones/examinacionPostura/crear', [PostureExaminationAPIController::class, 'storePostureExamination']);
});