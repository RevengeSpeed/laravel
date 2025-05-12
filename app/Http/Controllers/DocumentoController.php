<?php

namespace App\Http\Controllers;

use App\Models\Documento;        // 1) Importa el modelo
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DocumentoController extends Controller
{
    public function index()
    {
        // Obtiene todos los documentos de la BD
        $documentos = Documento::all();

        // Muestra una vista (crea resources/views/vistas/documentos_index.blade.php)
        return view('vistas.documentos_index', compact('documentos'));
    }

    public function create()
    {
        return view('vistas.documentos');
    }

    /**
     * Procesa el formulario y guarda las rutas en BD.
     */
    public function store(Request $request)
    {
        $request->validate([
            'perfil' => 'required|image',
            'titulo' => 'required|mimes:pdf,jpg,png',
            'certificados.*' => 'required|mimes:pdf,jpg,png',
            'certificados_externos.*' => 'required|mimes:pdf,jpg,png',
        ]);

        $perfil = $request->file('perfil')->store('documentos/perfil', 'public');
        $titulo = $request->file('titulo')->store('documentos/titulo', 'public');

        $certificados = [];
        if ($request->hasFile('certificados')) {
            foreach ($request->file('certificados') as $file) {
                $certificados[] = $file->store('documentos/certificados', 'public');
            }
        }

        $certificadosExternos = [];
        if ($request->hasFile('certificados_externos')) {
            foreach ($request->file('certificados_externos') as $file) {
                $certificadosExternos[] = $file->store('documentos/certificados_externos', 'public');
            }
        }

        Documento::create([
            'user_id' => Auth::id(), // ✅ Asegúrate de asociarlo al usuario logueado
            'perfil' => $perfil,
            'titulo' => $titulo,
            'certificados' => $certificados,
            'certificados_externos' => $certificadosExternos,
        ]);

        return redirect()->route('vistas.vistacvusuario')->with('success', 'Documentos guardados correctamente.');

    }
}
