<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class AdminController extends Controller
{
    public function assignRole(Request $request)
    {
        $user = User::find($request->user_id);
        if ($user) {
            $user->role = 'admin'; // Asignar el rol de administrador
            $user->save();
            return redirect()->back()->with('success', 'Rol asignado correctamente.');
        }
        return redirect()->back()->with('error', 'Usuario no encontrado.');
    }
}
