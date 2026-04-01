<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Middleware\Authenticate;

use App\Http\Controllers\PatientController;
use App\Http\Controllers\ConsultationController;
use App\Http\Controllers\AnthropometricalExaminationController;
use App\Http\Controllers\MadurativeExaminationController;
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
})->middleware('auth');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
	Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

	Route::resource('patients', PatientController::class);
	Route::prefix('patients')->group(function () {
		Route::get('{patient}/consultations', [PatientController::class, 'consultations'])->name('patients.consultations');   
	});
        
	Route::resource('consultations', ConsultationController::class);
	Route::prefix('consultations')->group(function () {
		Route::get('{consultation}/madurative', [ConsultationController::class, 'madurative'])->name('consultations.madurative');
		Route::get('{consultation}/anthropometrical', [ConsultationController::class, 'anthropometrical'])->name('consultations.anthropometrical');
		Route::get('{consultation}/physical', [ConsultationController::class, 'physical'])->name('consultations.physical');
		Route::get('{consultation}/posture', [ConsultationController::class, 'posture'])->name('consultations.posture');
	});

    Route::resource('madurative', MadurativeExaminationController::class);
    Route::resource('anthropometrical', AnthropometricalExaminationController::class);
    Route::resource('physical', PhysicalConditionExaminationController::class);
    Route::resource('posture', PostureExaminationController::class);
});

require __DIR__.'/auth.php';
