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

        $formacion = new FormAcadem();
        $formacion->nivel_educativo = $request->nivel_educativo;
        $formacion->institucion = $request->institucion;
        $formacion->carrera = $request->carrera;
        $formacion->titulo = $request->titulo;
        $formacion->certificaciones = $request->certificaciones;
        $formacion->save();
        
        if ($formacion->save()) {
            return redirect()->route('experiencia-laboral')->withInput()->with('success', 'Datos guardados correctamente');
        } else {
            return back()->with('error', 'Error al guardar los datos');
 
        }
    } catch (\Exception $e) {
        Log::error('Error al guardar: ' . $e->getMessage());
        return back()->with('error', 'Ocurrió un error inesperado.');
    }
}

}