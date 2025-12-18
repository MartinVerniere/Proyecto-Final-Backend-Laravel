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

	Route::prefix('patients')->group(function () {
		Route::resource('', PatientController::class);
		Route::get('pacientes/consultations/{id}', [PatientController::class, 'consultations'])->name('patients.consultations');   
	});
        
	Route::prefix('consultations')->group(function () {
		Route::resource('', ConsultationController::class);
		Route::get('anthropogenical/{id}', [ConsultationController::class, 'anthropogenical'])->name('consultations.anthropogenical');
		Route::get('anthropometrical/{id}', [ConsultationController::class, 'anthropometrical'])->name('consultations.anthropometrical');
		Route::get('physical/{id}', [ConsultationController::class, 'physical'])->name('consultations.physical');
		Route::get('posture/{id}', [ConsultationController::class, 'posture'])->name('consultations.posture');
	});

    Route::resource('anthropogenical', AnthropometricalExaminationController::class);
    Route::resource('anthropometrical', AnthropogenicalExaminationController::class);
    Route::resource('physical', PhysicalConditionExaminationController::class);
    Route::resource('posture', PostureExaminationController::class);
});

require __DIR__.'/auth.php';
