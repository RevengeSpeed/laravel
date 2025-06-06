<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Habilidades;
class MostrarCVS extends Controller
{
   

public function MostrarCVS(Request $request)
    {
        $query = $request->input('query');

        if (!empty($query)) {
            $habilidades = Habilidades::with('user') 
                ->where('habilidades_tecnicas', 'like', "%{$query}%")
                ->orWhere('habilidades_blandas', 'like', "%{$query}%")
                ->orWhere('idiomas', 'like', "%{$query}%")
                ->get();

            return view('vistas.MostrarCVS', compact('habilidades'));
        }

        $users = User::with(['formacionAcademica', 'formAcadem', 'habilidades', 'experienciaLaboral'])->get();
        return view('vistas.MostrarCVS', compact('users'));
    }

    
    public function show($id)
    {
        $user = User::with([
            'formacionAcademica',
            'formAcadem',
            'experienciaLaboral',
            'habilidades',
            'documento'       
        ])->findOrFail($id);

        return view('vistas.InformacionUsuarioCVS', compact('user'));
    }


    public function showAuthenticatedUser()
    {
        $user = Auth::user()->load([
            'formacionAcademica',
            'formAcadem',
            'experienciaLaboral',
            'habilidades',
            'documento'        
        ]);

        return view('vistas.vistacvusuario', compact('user'));
    }
}
