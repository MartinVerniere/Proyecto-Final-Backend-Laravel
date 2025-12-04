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

	Route::prefix('consultas')->group(function () {
		Route::get('', [ConsultationAPIController::class, 'index']);
		Route::get('{id}', [ConsultationAPIController::class, 'show']);
		Route::post('crear', [ConsultationAPIController::class, 'store']);
	});

	Route::prefix('pacientes')->group(function () {
		Route::get('', [PatientAPIController::class, 'index']);
		Route::prefix('{id}')->group(function () {
			Route::get('', [PatientAPIController::class, 'show']);
			Route::get('consultas', [ConsultationAPIController::class, 'indexByPatient']);
			Route::get('historial', [PatientAPIController::class, 'getAllExaminationsByPatient']);
		});
		Route::post('crear', [PatientAPIController::class, 'store']);
	});

	Route::prefix('examinaciones')->group(function () {
		Route::prefix('examinacionAntropogenica')->group(function () {
			Route::get('{id}', [AnthropogenicalExaminationAPIController::class, 'showAnthropogenicalExamination']);
			Route::post('crear', [AnthropogenicalExaminationAPIController::class, 'storeAnthropogenicalExamination']);
		});
		Route::prefix('examinacionAntropometrica')->group(function () {
			Route::get('{id}', [AnthropometricalExaminationAPIController::class, 'showAnthropometricalExamination']);
			Route::post('crear', [AnthropometricalExaminationAPIController::class, 'storeAnthropometricalExamination']);
		});
		Route::prefix('examinacionFisica')->group(function () {
			Route::get('{id}', [PhysicalConditionExaminationAPIController::class, 'showPhysicalConditionExamination']);
			Route::post('crear', [PhysicalConditionExaminationAPIController::class, 'storePhysicalConditionExamination']);
		});
		Route::prefix('examinacionPostura')->group(function () {
			Route::get('{id}', [PostureExaminationAPIController::class, 'showPostureExamination']);
			Route::post('crear', [PostureExaminationAPIController::class, 'storePostureExamination']);
		});
	});
});