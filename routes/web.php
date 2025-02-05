<?php

use App\Models\FormAcadem;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FormacionController;
use App\Http\Controllers\FormAcademcontroller;
use App\Http\Controllers\ExperienciaLaboralController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\HabilidadesController;

Route::get('/', function () {
    return view('welcome');
});
Route::get('/vistas/crear', [FormacionController::class, 'crear'])->name('vistas.crear');  // Vista del primer formulario
Route::post('/vistas/store', [FormacionController::class, 'store'])->name('vistas.store');  // Método para guardar el primer formulario

Route::get('/formacion-academica', [FormacionController::class, 'formacionAcademica'])->name('formacion-academica');  // Vista del segundo formulario
Route::post('/formacion-academica/store', [FormAcademcontroller::class, 'store'])->name('formacadem.store');  // Método para guardar el segundo formulario

Route::get('/experiencia-laboral', [ExperienciaLaboralController::class, 'create'])->name('experiencia-laboral');
Route::post('/experiencia-laboral/store', [ExperienciaLaboralController::class, 'store'])->name('experiencia-laboral.store');


Route::get('/habilidades', [HabilidadesController::class, 'create'])->name('habilidades'); // Usa el controlador correcto
Route::post('/habilidades/store', [HabilidadesController::class, 'store'])->name('habilidades.store');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::post('/admin/assign-role', [AdminController::class, 'assignRole'])->name('admin.assignRole');




Route::get('/admin/dashboard', function () {
    return view('admin.dashboard');
})->middleware('admin');
