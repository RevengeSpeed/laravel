<?php

use App\Models\FormAcadem;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FormacionController;
use App\Http\Controllers\FormAcademcontroller;
use App\Http\Controllers\ExperienciaLaboralController;
use App\Http\Controllers\HabilidadesController;


Route::get('/', function () {
    return view('welcome');
});
Route::get('/vistas/crear', [FormacionController::class, 'crear'])->name('vistas.crear');  // Vista del primer formulario
Route::post('/vistas/store', [FormacionController::class, 'store'])->name('vistas.store');  // Método para guardar el primer formulario

Route::get('/formacion-academica', [FormacionController::class, 'formacionAcademica'])->name('formacion-academica');  // Vista del segundo formulario
Route::post('/formacion-academica/store', [FormAcademcontroller::class, 'store'])->name('formacadem.store');  // Método para guardar el segundo formulario

Route::get('/experiencia-laboral', [ExperienciaLaboralController::class, 'create'])->name('experiencia-laboral');  // Vista del tercer formulario
Route::post('/experiencia-laboral/store', [ExperienciaLaboralController::class, 'store'])->name('experiencia-laboral.store');  // Método para guardar el tercer formulario


Route::get('/Habilidades', [ExperienciaLaboralController::class, 'create'])->name('Habilidades');

// Ruta para guardar los datos del cuarto formulario
Route::post('/Habilidades/store', [ExperienciaLaboralController::class, 'store'])->name('Habilidades.store');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
//realizamos una prueba

//prueba numero 2