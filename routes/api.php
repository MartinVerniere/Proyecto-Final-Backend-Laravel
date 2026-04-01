<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\PatientAPIController;
use App\Http\Controllers\Api\ConsultationAPIController;
use App\Http\Controllers\Api\MadurativeExaminationAPIController;
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

	Route::prefix('consultations')->group(function () {
		Route::get('', [ConsultationAPIController::class, 'index']);
		Route::get('{id}', [ConsultationAPIController::class, 'show']);
		Route::post('create', [ConsultationAPIController::class, 'store']);
	});

	Route::prefix('patients')->group(function () {
		Route::get('', [PatientAPIController::class, 'index']);
		Route::prefix('{id}')->group(function () {
			Route::get('', [PatientAPIController::class, 'show']);
			Route::get('consultations', [ConsultationAPIController::class, 'indexByPatient']);
			Route::get('medicalHistory', [PatientAPIController::class, 'getAllExaminationsByPatient']);
		});
		Route::post('create', [PatientAPIController::class, 'store']);
	});

	Route::prefix('examinations')->group(function () {
		Route::prefix('madurative')->group(function () {
			Route::get('{id}', [MadurativeExaminationAPIController::class, 'showMadurativeExamination']);
			Route::post('create', [MadurativeExaminationAPIController::class, 'storeMadurativeExamination']);
		});
		Route::prefix('anthropometrical')->group(function () {
			Route::get('{id}', [AnthropometricalExaminationAPIController::class, 'showAnthropometricalExamination']);
			Route::post('create', [AnthropometricalExaminationAPIController::class, 'storeAnthropometricalExamination']);
		});
		Route::prefix('physical')->group(function () {
			Route::get('{id}', [PhysicalConditionExaminationAPIController::class, 'showPhysicalConditionExamination']);
			Route::post('create', [PhysicalConditionExaminationAPIController::class, 'storePhysicalConditionExamination']);
		});
		Route::prefix('posture')->group(function () {
			Route::get('{id}', [PostureExaminationAPIController::class, 'showPostureExamination']);
			Route::post('create', [PostureExaminationAPIController::class, 'storePostureExamination']);
		});
	});
});