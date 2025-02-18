<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class MostrarCVS extends Controller
{
    public function MostrarCVS()
    {
        $users = User::with(['formacionAcademica', 'formAcadem', 'habilidades', 'experienciaLaboral'])->get();
        return view('vistas.MostrarCVS', compact('users'));
    }

    public function show($id)
    {
        $user = User::with(['formacionAcademica', 'formAcadem', 'habilidades', 'experienciaLaboral'])->findOrFail($id);
        return view('vistas.InformacionUsuarioCVS', compact('user'));
    }

    public function showAuthenticatedUser()
    {
        $user = Auth::user()->load(['formacionAcademica', 'formAcadem', 'habilidades', 'experienciaLaboral']);
        return view('vistas.vistacvusuario', compact('user'));
    }
}