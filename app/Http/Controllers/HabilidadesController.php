<?php

namespace App\Http\Controllers;

use App\Models\Habilidades;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class HabilidadesController extends Controller
{
    public function create()
    {
        return view('vistas.Habilidades'); // Vista para el cuarto formulario
    }
    public function store(Request $request)
    {
        try {
        // Validación de los datos del segundo formulario de habilidades laboral
        $request->validate([
            'habilidades_tecnicas' => 'nullable|string|max:255',
            'habilidades_blandas' => 'nullable|string|max:255',
            'idiomas' => 'nullable|string|max:255'
        ]);

        // Guardar los datos del segundo formulario
        $habilidades = new Habilidades();
        $habilidades->habilidades_tecnicas = $request->habilidades_tecnicas;
        $habilidades->habilidades_blandas = $request->habilidades_blandas;
        $habilidades->idiomas = $request->idiomas;

        $habilidades->save();

        
        if ($habilidades->save()) {
            return redirect()->route('Habilidades')->with('success', 'Datos guardados correctamente');
        } else {
            return back()->with('error', 'Error al guardar los datos');
 
        }
    } catch (\Exception $e) {
        Log::error('Error al guardar: ' . $e->getMessage());
        return back()->with('error', 'Ocurrió un error inesperado.');
    }
    }
}
