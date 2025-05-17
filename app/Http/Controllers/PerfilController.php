<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PerfilController extends Controller
{
    public function edit()
    {
        $user = Auth::user()->load(['formacionAcademica', 'formAcadem', 'experienciaLaboral', 'habilidades', 'documento']);
        return view('vistas.editar_perfil', compact('user'));
    }

    public function update(Request $request)
    {
        $user = auth()->user();
        $user = auth()->user();
    
        $data = $request->validate([
            // Datos personales
            'Nombre' => 'nullable|string|max:255',
            'Apellido' => 'nullable|string|max:255',
            'Nacionalidad' => 'nullable|string|max:255',
            'Direccion' => 'nullable|string|max:255',
            'Correo' => 'nullable|email|max:255',
            'Telefono' => 'nullable|string|max:50',
            'Genero' => 'nullable|string|max:50',
            'FechaNacimiento' => 'nullable|date',

            // Formación Académica
            'institucion' => 'nullable|string|max:255',
            'carrera' => 'nullable|string|max:255',
            'titulo' => 'nullable|string|max:50',
            'certificaciones' => 'nullable|string',

            // Experiencia Laboral
            'nivel_educativo' => 'nullable|string|max:255',
            'titulo_empleado' => 'nullable|string|max:255',
            'empresa_actual' => 'nullable|string|max:255',
            'cargo_actual' => 'nullable|string|max:255',
            'descripcion_responsabilidades' => 'nullable|string',

            // Habilidades
            'habilidades_tecnicas' => 'nullable|string|max:255',
            'habilidades_blandas' => 'nullable|string|max:255',
            'idiomas' => 'nullable|string|max:255',

            // Archivos
            'perfil' => 'nullable|file|image|max:2048',
            'titulo_archivo' => 'nullable|file|max:4096',
            'certificados.*' => 'nullable|file|max:4096',
            'certificados_externos.*' => 'nullable|file|max:4096',
        ]);
       
        // Actualiza o crea datos personales (formacionAcademica)
        $formacion = $user->formacionAcademica()->firstOrNew([]);
        $formacion->Nombre = $data['Nombre'] ?? $formacion->Nombre;
        $formacion->Apellido = $data['Apellido'] ?? $formacion->Apellido;
        $formacion->Nacionalidad = $data['Nacionalidad'] ?? $formacion->Nacionalidad;
        $formacion->Direccion = $data['Direccion'] ?? $formacion->Direccion;
        $formacion->Correo = $data['Correo'] ?? $formacion->Correo;
        $formacion->Telefono = $data['Telefono'] ?? $formacion->Telefono;
        $formacion->Genero = $data['Genero'] ?? $formacion->Genero;
        $formacion->FechaNacimiento = $data['FechaNacimiento'] ?? $formacion->FechaNacimiento;
        $formacion->save();

        // Formación Académica (formAcadem)
        $formAcadem = $user->formAcadem()->firstOrNew([]);
        $formAcadem->institucion = $data['institucion'] ?? $formAcadem->institucion;
        $formAcadem->carrera = $data['carrera'] ?? $formAcadem->carrera;
        $formAcadem->titulo = $data['titulo'] ?? $formAcadem->titulo;
        $formAcadem->certificaciones = $data['certificaciones'] ?? $formAcadem->certificaciones;
        $formAcadem->save();

        // Experiencia Laboral
        $expLab = $user->experienciaLaboral()->firstOrNew([]);
        $expLab->nivel_educativo = $data['nivel_educativo'] ?? $expLab->nivel_educativo;
        $expLab->titulo_empleado = $data['titulo_empleado'] ?? $expLab->titulo_empleado;
        $expLab->empresa_actual = $data['empresa_actual'] ?? $expLab->empresa_actual;
        $expLab->cargo_actual = $data['cargo_actual'] ?? $expLab->cargo_actual;
        $expLab->descripcion_responsabilidades = $data['descripcion_responsabilidades'] ?? $expLab->descripcion_responsabilidades;
        $expLab->save();

        // Habilidades
        $habilidades = $user->habilidades()->firstOrNew([]);
        $habilidades->habilidades_tecnicas = $data['habilidades_tecnicas'] ?? $habilidades->habilidades_tecnicas;
        $habilidades->habilidades_blandas = $data['habilidades_blandas'] ?? $habilidades->habilidades_blandas;
        $habilidades->idiomas = $data['idiomas'] ?? $habilidades->idiomas;
        $habilidades->save();

        // Documento (archivos)
        $documento = $user->documento()->firstOrNew([]);

        // Perfil foto
        if ($request->hasFile('perfil')) {
            if ($documento->foto_perfil) {
                Storage::delete($documento->foto_perfil);
            }
            $pathPerfil = $request->file('perfil')->store('public/perfiles');
            $documento->foto_perfil = $pathPerfil;
        }

        // Título archivo
        if ($request->hasFile('titulo_archivo')) {
            if ($documento->titulo) {
                Storage::delete($documento->titulo);
            }
            $pathTitulo = $request->file('titulo_archivo')->store('public/titulos');
            $documento->titulo = $pathTitulo;
        }

        // Certificados múltiples (los guardamos como JSON con paths)
        if ($request->hasFile('certificados')) {
            // Borramos archivos viejos si tienes (opcional)
            if ($documento->certificados) {
                $antiguos = json_decode($documento->certificados, true) ?: [];
                foreach ($antiguos as $antiguo) {
                    Storage::delete($antiguo);
                }
            }
            $certificadosPaths = [];
            foreach ($request->file('certificados') as $certificado) {
                $certificadosPaths[] = $certificado->store('public/certificados');
            }
            $documento->certificados = json_encode($certificadosPaths);
        }

        // Certificados externos múltiples
        if ($request->hasFile('certificados_externos')) {
            if ($documento->certificados_externos) {
                $antiguos = json_decode($documento->certificados_externos, true) ?: [];
                foreach ($antiguos as $antiguo) {
                    Storage::delete($antiguo);
                }
            }
            $externosPaths = [];
            foreach ($request->file('certificados_externos') as $externo) {
                $externosPaths[] = $externo->store('public/certificados_externos');
            }
            $documento->certificados_externos = json_encode($externosPaths);
        }

        $documento->save();

        return redirect()->route('perfil.show')->with('success', 'Perfil actualizado correctamente.');
    }

    public function show()
    {
        $user = Auth::user()->load(['formacionAcademica', 'formAcadem', 'experienciaLaboral', 'habilidades', 'documento']);
        return view('vistas.perfil', compact('user'));
    }
}
