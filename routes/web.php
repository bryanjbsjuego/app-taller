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

// Especialidades 
//Regresan vistas
Route::get('/specialties', [App\Http\Controllers\SpecialityController::class, 'index']);
Route::get('/specialties/create', [App\Http\Controllers\SpecialityController::class, 'create']); //Formulario de registro
Route::get('/specialties/{specialty}/edit', [App\Http\Controllers\SpecialityController::class, 'edit']);

Route::post('/specialties', [App\Http\Controllers\SpecialityController::class, 'store']); //envío de formulario de registro
Route::put('/specialties/{specialty}', [App\Http\Controllers\SpecialityController::class, 'update']);
Route::delete('/specialties/{specialty}', [App\Http\Controllers\SpecialityController::class, 'destroy']);

//Doctores

Route::resource('doctors',  App\Http\Controllers\DoctorController::class);

//Pacientes