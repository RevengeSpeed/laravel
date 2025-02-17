<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Habilidades;
class MostrarCVS extends Controller
{
    public function MostrarCVS(Request $request)
    {
        $query = $request->input('query');

        if ($query) {
            // Separar el query en palabras individuales
            $keywords = explode(' ', $query);

            // Iniciar una consulta base
            $habilidadesQuery = Habilidades::query();

            // Buscar cada palabra en habilidades_tecnicas, habilidades_blandas e idiomas
            foreach ($keywords as $word) {
                $habilidadesQuery->orWhere('habilidades_tecnicas', 'LIKE', "%{$word}%")
                    ->orWhere('habilidades_blandas', 'LIKE', "%{$word}%")
                    ->orWhere('idiomas', 'LIKE', "%{$word}%");
            }

            // Obtener los IDs de las habilidades encontradas
            $habilidades = $habilidadesQuery->pluck('id')->toArray();

            // Buscar usuarios cuyos IDs coinciden con los IDs de habilidades
            $users = User::whereIn('id', $habilidades)
                ->with(['formacionAcademica', 'formAcadem', 'habilidades', 'experienciaLaboral'])
                ->get();
        } else {
            // Si no hay bÃºsqueda, mostrar todos los usuarios
            $users = User::with(['formacionAcademica', 'formAcadem', 'habilidades', 'experienciaLaboral'])->get();
        }

        return view('vistas.MostrarCVS', compact('users'));
    }


    public function show($id)
    {
        $user = User::with(['formacionAcademica', 'formAcadem', 'habilidades', 'experienciaLaboral'])->findOrFail($id);
        return view('vistas.InformacionUsuarioCVS', compact('user'));
    }
}
