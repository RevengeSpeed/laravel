<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\FormAcadem;
use Illuminate\Support\Facades\Log;
class FormAcademcontroller extends Controller
{
    public function crear()
    {
        return view('vistas.crear'); // Vista del primer formulario
    }

    public function store(Request $request)
{
    try {
        $request->validate([
            'nivel_educativo' => 'required|string|max:255',
            'institucion' => 'nullable|string|max:255',
            'carrera' => 'nullable|string|max:255',
            'titulo' => 'nullable|in:obtenido,en-curso',
            'certificaciones' => 'nullable|string|max:255',
        ]);

        // Crear un nuevo registro de formación
        $formacion = new FormAcadem();
        $formacion->nivel_educativo = $request->nivel_educativo;
        $formacion->institucion = $request->institucion;
        $formacion->carrera = $request->carrera;
        $formacion->titulo = $request->titulo;
        $formacion->certificaciones = $request->certificaciones;
        
        // Aquí asignamos el id del usuario logueado
        $formacion->user_id = auth()->user()->id;  // Asociamos el usuario con el ID

        // Guardar los datos
        $formacion->save();

        return redirect()->route('experiencia-laboral')->with('success', 'Datos guardados correctamente');
    } catch (\Exception $e) {
        Log::error('Error al guardar: ' . $e->getMessage());
        return back()->with('error', 'Ocurrió un error inesperado.');
    }
}

public function mostrarCV()
{
    // Obtener el usuario logueado
    $usuarioLogueado = auth()->user();

    // Filtrar los datos para que solo se obtenga la información del usuario logueado
    $datos = FormAcadem::where('user_id', $usuarioLogueado->id)->get();

    // Pasar los datos a la vista
    return view('vistas.vistacvusuario', compact('datos'));
}


public function __construct()
{
    $this->middleware('auth');  // Asegura que solo los usuarios autenticados puedan acceder a esta función
}




}
