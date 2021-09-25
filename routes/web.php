<?php

use Illuminate\Support\Facades\Route;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::middleware(['auth', 'admin'])->namespace('App\Http\Controllers\Admin')->group(function () {
    // Especialidades 

    Route::resource('specialties', \SpecialityController::class);

    //Doctores

    Route::resource('doctors',  \DoctorController::class);

    //Pacientes

    Route::resource('patients',  \PatientController::class);
});

Route::middleware(['auth', 'doctor'])->namespace('App\Http\Controllers\Doctor')->group(function () {
    
    Route::resource('schelude',  \ScheludeController::class);
});

