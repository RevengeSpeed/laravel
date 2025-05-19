<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\MostrarPracticas;

class MostrarPracticasController extends Controller
{
    public function index(Request $request)
    {
        $query = $request->input('query');

        if (!empty($query)) {
            $practicas = MostrarPracticas::where('cualidades', 'like', "%{$query}%")
                ->orWhere('habilidades_blandas', 'like', "%{$query}%")
                ->get();
        } else {
            $practicas = MostrarPracticas::all();
        }

        return view('vistas.practicas', compact('practicas', 'query'));
    }


    public function show($id)
    {
        $practica = MostrarPracticas::findOrFail($id);
        return view('vistas.InformacionUsuarioPracticas', compact('practica'));
    }
}
