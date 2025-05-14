<?php

namespace App\Http\Controllers;

use App\Models\Practica;
use Illuminate\Http\Request;

class PracticasController extends Controller
{
    /**
     * Mostrar el formulario de prácticas.
     */
    public function create()
    {
        return view('vistas.createpracticas');
    }

    /**
     * Almacenar una nueva práctica en la base de datos.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'nombre'                        => 'required|string|max:100',
            'apellidos'                     => 'required|string|max:100',
            'fecha_inicio_universidad'      => 'required|date',
            'tiene_reprobadas'              => 'sometimes|boolean',
            'cantidad_reprobadas'           => 'required_if:tiene_reprobadas,1|integer|min:1',
            'cualidades'                    => 'nullable|string',
            'lenguajes_programacion'        => 'nullable|array',
            'lenguajes_programacion.*'      => 'string|max:50',
            'certificados'                  => 'nullable|array',
            'certificados.*'                => 'file|mimes:pdf,jpg,png|max:2048',
        ]);

        // Si no marcó reprobadas, aseguramos cantidad = 0
        if (empty($data['tiene_reprobadas'])) {
            $data['cantidad_reprobadas'] = 0;
        }

        // Procesar subida de archivos de certificados
        if ($request->hasFile('certificados')) {
            $paths = [];
            foreach ($request->file('certificados') as $file) {
                $paths[] = $file->store('certificados', 'public');
            }
            $data['certificados'] = $paths;
        }

        // Guardar arreglo de lenguajes como JSON
        // (Eloquent los casteará automáticamente si el modelo los configura en $casts)
        // Aquí nos aseguramos de que exista la clave:
        $data['lenguajes_programacion'] = $data['lenguajes_programacion'] ?? [];

        Practica::create($data);

        return redirect()
            ->route('vistas.createpractricas')
            ->with('status', 'Práctica guardada correctamente');
    }
}
