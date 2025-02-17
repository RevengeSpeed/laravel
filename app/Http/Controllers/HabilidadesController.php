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
                'user_id',
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
                return redirect()->route('curriculum')->with('success', '¡Solicitud completada!');
            } else {
                return back()->with('error', 'Error al guardar los datos');

            }
        } catch (\Exception $e) {
            Log::error('Error al guardar: ' . $e->getMessage());
            return back()->with('error', 'Ocurrió un error inesperado.');
        }
    }
    // Nuevo método para buscar en MostrarCVS
    public function buscarEnMostrarCVS(Request $request)
    {
        $query = $request->input('query');

        // Verifica si hay un término de búsqueda
        if ($query) {
            // Filtra usuarios por habilidades técnicas, blandas o idiomas
            $users = User::whereHas('habilidades', function ($q) use ($query) {
                $q->where('habilidades_tecnicas', 'LIKE', "%{$query}%")
                    ->orWhere('habilidades_blandas', 'LIKE', "%{$query}%")
                    ->orWhere('idiomas', 'LIKE', "%{$query}%");
            })->get();
        } else {
            // Si no hay búsqueda, muestra todos los usuarios
            $users = User::all();
        }

        return view('vistas.mostrarcvs', compact('users'));
    }



}
