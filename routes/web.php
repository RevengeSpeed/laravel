<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\{
    MostrarCVS,
    FormacionController,
    FormAcademcontroller,
    ExperienciaLaboralController,
    AdminController,
    HabilidadesController,
    DocumentoController,
    PracticasController,
    PerfilController
};

Route::get('/', function () {
    return view('welcome');
});

// Formularios
Route::get('/vistas/crear', [FormacionController::class, 'crear'])->name('vistas.crear');
Route::post('/vistas/store', [FormacionController::class, 'store'])->name('vistas.store');

Route::get('/formacion-academica', [FormacionController::class, 'formacionAcademica'])->name('formacion-academica');
Route::post('/formacion-academica/store', [FormAcademcontroller::class, 'store'])->name('formacadem.store');

Route::get('/experiencia-laboral', [ExperienciaLaboralController::class, 'create'])->name('experiencia-laboral');
Route::post('/experiencia-laboral/store', [ExperienciaLaboralController::class, 'store'])->name('experiencia-laboral.store');

Route::get('/habilidades', [HabilidadesController::class, 'create'])->name('habilidades');
Route::post('/habilidades/store', [HabilidadesController::class, 'store'])->name('habilidades.store');

// Autenticación
Auth::routes();
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// Admin
Route::post('/admin/assign-role', [AdminController::class, 'assignRole'])->name('admin.assignRole');
Route::get('/admin/dashboard', function () {
    return view('admin.dashboard');
})->middleware('admin')->name('admin.dashboard');

// Mostrar CVs
Route::get('/mostrar-cvs', [MostrarCVS::class, 'MostrarCVS'])->name('vistas.MostrarCVS');
Route::get('/mostrar-cvs/{id}', [MostrarCVS::class, 'show'])->name('vistas.InformacionUsuarioCVS');
Route::get('/mi-cv', [MostrarCVS::class, 'showAuthenticatedUser'])->name('vistas.vistacvusuario');

// Documentos
Route::get('/documentos', [DocumentoController::class, 'index'])->name('documentos.index');
Route::get('/documentos/create', [DocumentoController::class, 'create'])->name('documentos.create');
Route::post('/documentos', [DocumentoController::class, 'store'])->name('documentos.store');

// Prácticas
Route::get('/practicas/crear', [PracticasController::class, 'create'])->name('vistas.createpracticas');
Route::post('/practicas/crear', [PracticasController::class, 'store'])->name('vistas.createpracticas.store');


//editar perfil
Route::middleware(['auth'])->group(function () {
    Route::get('/perfil/editar', [PerfilController::class, 'edit'])->name('perfil.editar');
    Route::post('/perfil/editar', [PerfilController::class, 'update'])->name('perfil.update');
    Route::get('/perfil', [PerfilController::class, 'show'])->name('perfil.show');

});