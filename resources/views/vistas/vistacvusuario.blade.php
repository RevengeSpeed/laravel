@extends('layouts.app')

@section('content')
<div class="container">
    <h2 class="mb-4">Mi Formación Académica</h2>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <h4>Datos de Formación Académica</h4>
    <div class="table-responsive">
        <table class="table table-bordered">
            <thead class="thead-dark">
                <tr>
                    <th>Nivel Educativo</th>
                    <th>Institución</th>
                    <th>Carrera</th>
                    <th>Título</th>
                    <th>Certificaciones</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($datos as $dato)
                    <tr>
                        <td>{{ $dato->nivel_educativo }}</td>
                        <td>{{ $dato->institucion }}</td>
                        <td>{{ $dato->carrera }}</td>
                        <td>{{ $dato->titulo }}</td>
                        <td>{{ $dato->certificaciones }}</td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" class="text-center">No hay datos disponibles.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
    <h4>Datos Generales</h4>
    <div class="table-responsive">
        <table class="table table-bordered">
            <thead class="thead-dark">
                <tr>
                    <th>Nombre</th>
                    <th>Apellido</th>
                    <th>Nacionalidad</th>
                    <th>Direccion</th>
                    <th>Correo</th>
                    <th>Telefono</th>
                    <th>Genero</th>
                    <th>FechaNacimiento</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($datosFormacion as $dato)
                    <tr>
                        <td>{{ $dato->Nombre }}</td>
                        <td>{{ $dato->Apellido }}</td>
                        <td>{{ $dato->Nacionalidad }}</td>
                        <td>{{ $dato->Direccion }}</td>
                        <td>{{ $dato->Correo }}</td>
                        <td>{{ $dato->Telefono }}</td>
                        <td>{{ $dato->Genero }}</td>
                        <td>{{ $dato->FechaNacimiento }}</td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="8" class="text-center">No se encontraron datos de formación académica.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
