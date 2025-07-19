<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\APIPatientController;
use App\Http\Controllers\APIConsultationController;
use App\Http\Controllers\APIExaminationsController;

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

Route::get('consultas', [APIConsultationController::class, 'index']);
Route::get('consultas/{id}', [APIConsultationController::class, 'show']);

Route::get('pacientes', [APIPatientController::class, 'index']);
Route::get('pacientes/{id}', [APIPatientController::class, 'show']);
Route::get('pacientes/{id}/consultas', [APIConsultationController::class, 'indexByPatient']);
Route::post('pacientes/crear', [APIPatientController::class, 'store']);

Route::get('examinaciones/examinacionAntropogenica/{id}', [APIExaminationsController::class, 'showAnthropogenicalExamination']);
Route::get('examinaciones/examinacionAntropometrica/{id}', [APIExaminationsController::class, 'showAnthropometricalExamination']);
Route::get('examinaciones/examinacionFisica/{id}', [APIExaminationsController::class, 'showPhysicalConditionExamination']);
Route::get('examinaciones/examinacionPostura/{id}', [APIExaminationsController::class, 'showPostureExamination']);

Route::post('examinaciones/examinacionAntropogenica/crear', [APIExaminationsController::class, 'storeAnthropogenicalExamination']);
Route::post('examinaciones/examinacionAntropometrica/crear', [APIExaminationsController::class, 'storeAnthropometricalExamination']);
Route::post('examinaciones/examinacionFisica/crear', [APIExaminationsController::class, 'storePhysicalConditionExamination']);