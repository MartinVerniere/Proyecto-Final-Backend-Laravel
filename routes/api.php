<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\APIConsultationController;
use App\Http\Controllers\APIPatientController;
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

Route::middleware('auth:sanctum')->group(function () {
    Route::prefix('consultas')->group(function () {
        Route::get('/', [APIConsultationController::class, 'index']);
        Route::get('/{id}', [APIConsultationController::class, 'show']);
        Route::post('/crear', [APIConsultationController::class, 'store']);
    });
    
    Route::prefix('pacientes')->group(function () {
        Route::get('/', [APIPatientController::class, 'index']);
        Route::get('/{id}', [APIPatientController::class, 'show']);
        Route::get('/{id}/consultas', [APIConsultationController::class, 'indexByPatient']);
        Route::post('/crear', [APIPatientController::class, 'store']);
    });
    
    Route::prefix('examinaciones')->group(function () {
        Route::prefix('examinacionAntropogenica')->group(function () {
            Route::get('/{id}', [APIExaminationsController::class, 'showAnthropogenicalExamination']);
            Route::post('/crear', [APIExaminationsController::class, 'storeAnthropogenicalExamination']);
        });
        Route::prefix('examinacionAntropometrica')->group(function () {
            Route::get('/{id}', [APIExaminationsController::class, 'showAnthropometricalExamination']);
            Route::post('/crear', [APIExaminationsController::class, 'storeAnthropometricalExamination']);
        });
        Route::prefix('examinacionFisica')->group(function () {
            Route::get('/{id}', [APIExaminationsController::class, 'showPhysicalConditionExamination']);
            Route::post('/crear', [APIExaminationsController::class, 'storePhysicalConditionExamination']);
        });
        Route::prefix('examinacionPostura')->group(function () {
            Route::get('/{id}', [APIExaminationsController::class, 'showPostureExamination']);
            Route::post('/crear', [APIExaminationsController::class, 'storePostureExamination']);
        });   
    });
});