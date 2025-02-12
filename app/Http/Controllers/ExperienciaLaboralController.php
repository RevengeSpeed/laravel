<?php

namespace App\Http\Controllers;

use App\Models\ExperienciaLaboral;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ExperienciaLaboralController extends Controller
{
    use HasFactory;
    public function create()
{
    return view('vistas.Experiencia');
 
}
    
    public function store(Request $request)
    {
        try {
        
        $request->validate([
            'nivel_educativo' => 'nullable|string|max:255',
            'titulo_empleado' => 'nullable|string|max:255',
            'empresa_actual' => 'nullable|string|max:255',
            'cargo_actual' => 'nullable|string|max:255',
            'descripcion_responsabilidades' => 'nullable|string|max:1000',
        ]);

        
        $experiencia = new ExperienciaLaboral();
        $experiencia->nivel_educativo = $request->nivel_educativo;
        $experiencia->titulo_empleado = $request->titulo_empleado;
        $experiencia->empresa_actual = $request->empresa_actual;
        $experiencia->cargo_actual = $request->cargo_actual;
        $experiencia->descripcion_responsabilidades = $request->descripcion_responsabilidades;

        $experiencia->save();

        
        if ($experiencia->save()) {
            return redirect()->route('habilidades')->with('success', 'Datos guardados correctamente');


        } else {
            return back()->with('error', 'Error al guardar los datos');
 
        }
    } catch (\Exception $e) {
        Log::error('Error al guardar: ' . $e->getMessage());
        return back()->with('error', 'Ocurrió un error inesperado.');
    }
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
