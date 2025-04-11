<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Middleware\Authenticate;

use App\Http\Controllers\PatientController;
use App\Http\Controllers\ExaminationController;
use App\Http\Controllers\AnthropometricalExaminationController;
use App\Http\Controllers\AnthropogenicalExaminationController;
use App\Http\Controllers\PhysicalExaminationController;

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
    Route::get('pacientes/examinacionesAsociadas/{id}', [PatientController::class, 'examinacionesAsociadas'])
        ->name('pacientes.examinacionesAsociadas');   
        
    Route::resource('examinaciones', ExaminationController::class);
    Route::get('examinaciones/examinacionFisicaAsociada/{id}', [ExaminationController::class, 'examinacionFisicaAsociada'])
        ->name('examinaciones.examinacionFisicaAsociada');
    Route::get('examinaciones/examinacionAntropogenicaAsociada/{id}', [ExaminationController::class, 'examinacionAntropogenicaAsociada'])
        ->name('examinaciones.examinacionAntropogenicaAsociada');
    Route::get('examinaciones/examinacionAntropometricaAsociada/{id}', [ExaminationController::class, 'examinacionAntropometricaAsociada'])
        ->name('examinaciones.examinacionAntropometricaAsociada');

    Route::resource('examinacionesAntropometricas', AnthropometricalExaminationController::class);
    Route::resource('examinacionesAntropogenicas', AnthropogenicalExaminationController::class);
    Route::resource('examinacionesFisicas', PhysicalExaminationController::class);
});

require __DIR__.'/auth.php';
