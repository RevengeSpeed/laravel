<?php

namespace App\Http\Controllers;

use App\Models\FormacionAcademica;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class FormacionController extends Controller
{
    public function crear()
    {
        return view('vistas.crear'); // Vista para el primer formulario
    }
    public function formacionAcademica()
    {
        return view('vistas.formacadem'); // Asegúrate de que esta vista exista
    }
    
    public function store(Request $request)
    {
        try {
            // Validación de los datos del primer formulario
            $request->validate([
                'Nombre' => 'required|string|max:255',
                'Apellido' => 'required|string|max:255',
                'Nacionalidad' => 'required|string|max:255',
                'Direccion' => 'required|string|max:255',
                'Correo' => 'required|email|max:255|unique:formacionacademica,Correo',
                'Telefono' => 'required|digits_between:7,15',
                'Genero' => 'required|string|max:255',
                'FechaNacimiento' => 'required|date',
            ]);
    
            // Guardar los datos del primer formulario
            $formacion = new FormacionAcademica();
            $formacion->Nombre = $request->Nombre;
            $formacion->Apellido = $request->Apellido;
            $formacion->Nacionalidad = $request->Nacionalidad;
            $formacion->Direccion = $request->Direccion;
            $formacion->Correo = $request->Correo;
            $formacion->Telefono = $request->Telefono;
            $formacion->Genero = $request->Genero;
            $formacion->FechaNacimiento = $request->FechaNacimiento;
    
            if ($formacion->save()) {
                return redirect()->route('formacion-academica')->with('success', 'Datos guardados correctamente');
            } else {
                return back()->with('error', 'Error al guardar los datos');
            }
        } catch (\Exception $e) {
            Log::error('Error al guardar: ' . $e->getMessage());
            return back()->with('error', 'Ocurrió un error inesperado.');
        }
    }
    
    
}