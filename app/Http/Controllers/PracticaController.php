<?php

namespace App\Http\Controllers;

use App\Models\Practica;
use Illuminate\Http\Request;

class PracticaController extends Controller
{
    /**
     * Muestra el formulario para crear una nueva práctica.
     */
    public function create()
    {
        return view('vistas.createpracticas');
    }

    /**
     * Almacena una nueva práctica en la base de datos.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'nombre' => 'required|string|max:255',
            'apellidos' => 'required|string|max:255',
            'fecha_inicio_universidad' => 'required|date',
            'cualidades' => 'nullable|string',
            'habilidades_blandas' => 'nullable|string',
            'certificados.*' => 'nullable|file|mimes:pdf,jpg,jpeg,png|max:4096',
        ]);

        $rutasCertificados = [];
        if ($request->hasFile('certificados')) {
            foreach ($request->file('certificados') as $file) {
                $nombreArchivo = time() . '_' . $file->getClientOriginalName();
                $ruta = $file->storeAs('certificados', $nombreArchivo, 'public');
                $rutasCertificados[] = $ruta;
            }
        }

        $practica = Practica::create([
            'nombre' => $data['nombre'],
            'apellidos' => $data['apellidos'],
            'fecha_inicio_universidad' => $data['fecha_inicio_universidad'],
            'cualidades' => $data['cualidades'] ?? null,
            'habilidades_blandas' => $data['habilidades_blandas'] ?? null,
            'certificados' => $rutasCertificados,
        ]);

        return redirect()
            ->back()
            ->with('status', 'Práctica enviada con éxito.');
    }

    /**
     * Muestra una lista de todas las prácticas.
     */
    public function index()
    {
        $practicas = Practica::orderBy('created_at', 'desc')->get();
        return view('vistas.InformacionUsuarioPracticas', compact('practicas'));
    }

    /**
     * Muestra los detalles de una práctica específica.
     */
    public function show($id)
    {
        $practica = Practica::findOrFail($id);
        return view('vistas.InformacionUsuarioPracticas', compact('practica'));
    }
}
