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
        // 1) Validación
        $data = $request->validate([
            'nombre' => 'required|string|max:100',
            'apellidos' => 'required|string|max:100',
            'fecha_inicio_universidad' => 'required|date',
            'tiene_reprobadas' => 'sometimes|boolean',
            'cantidad_reprobadas' => 'required_if:tiene_reprobadas,1|integer|min:1',
            'cualidades' => 'nullable|string',
            'habilidades_blandas' => 'nullable|string',
            'certificados' => 'nullable|array',
            'certificados.*' => 'file|mimes:pdf,jpg,png|max:2048',
        ]);

        // 2) Asegurar cantidad de reprobadas
        if (empty($data['tiene_reprobadas'])) {
            $data['cantidad_reprobadas'] = 0;
        }

        // 3) Convertir el textarea en array, quitando espacios vacíos
        if (!empty($data['habilidades_blandas'])) {
            $data['habilidades_blandas'] = array_filter(array_map('trim', explode(',', $data['habilidades_blandas'])));
        } else {
            $data['habilidades_blandas'] = [];
        }

        // 4) Procesar subida de certificados
        if ($request->hasFile('certificados')) {
            $paths = [];
            foreach ($request->file('certificados') as $file) {
                $paths[] = $file->store('certificados', 'public');
            }
            $data['certificados'] = $paths;
        }

        // 5) Crear y guardar
        Practica::create($data);

        return redirect()
            ->route('vistas.practicas')
            ->with('status', 'Práctica guardada correctamente');
    }


}
