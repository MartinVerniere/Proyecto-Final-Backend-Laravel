<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Middleware\Authenticate;

use App\Http\Controllers\PatientController;
use App\Http\Controllers\ConsultationController;
use App\Http\Controllers\AnthropometricalExaminationController;
use App\Http\Controllers\AnthropogenicalExaminationController;
use App\Http\Controllers\PhysicalConditionExaminationController;
use App\Http\Controllers\PostureExaminationController;
use App\Http\Controllers\APIPatientController;
use App\Http\Controllers\APIConsultationController;
use App\Http\Controllers\APIExaminationsController;
use App\Http\Controllers\Auth\AuthControllerApi;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('mainpage');
})->middleware(Authenticate::Class);;

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware('auth')->group(function () {
    Route::resource('pacientes', PatientController::class);
    Route::get('pacientes/consultasAsociadas/{id}', [PatientController::class, 'consultasAsociadas'])
        ->name('pacientes.consultasAsociadas');   
        
    Route::resource('consultas', ConsultationController::class);
    Route::get('consultas/examinacionFisicaAsociada/{id}', [ConsultationController::class, 'examinacionFisicaAsociada'])
        ->name('consultas.examinacionFisicaAsociada');
    Route::get('consultas/examinacionAntropogenicaAsociada/{id}', [ConsultationController::class, 'examinacionAntropogenicaAsociada'])
        ->name('consultas.examinacionAntropogenicaAsociada');
    Route::get('consultas/examinacionAntropometricaAsociada/{id}', [ConsultationController::class, 'examinacionAntropometricaAsociada'])
        ->name('consultas.examinacionAntropometricaAsociada');
    Route::get('consultas/examinacionPosturaAsociada/{id}', [ConsultationController::class, 'examinacionPosturaAsociada'])
        ->name('consultas.examinacionPosturaAsociada');

    Route::resource('examinacionesAntropometricas', AnthropometricalExaminationController::class);
    Route::resource('examinacionesAntropogenicas', AnthropogenicalExaminationController::class);
    Route::resource('examinacionesFisicas', PhysicalConditionExaminationController::class);
    Route::resource('examinacionesPostura', PostureExaminationController::class);
});


Route::post('/login', [AuthControllerApi::class, 'login']);
Route::post('/register', [AuthControllerApi::class, 'register']);
Route::middleware('auth:sanctum')->post('/logout', [AuthControllerApi::class, 'logout']);

require __DIR__.'/auth.php';