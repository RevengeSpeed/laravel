@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <h2 class="mb-4">Lista de Practicantes</h2>

    <!-- Formulario de búsqueda -->
    <form action="{{ route('vistas.practicas') }}" method="GET" class="mb-4">
        <input type="text" name="query" placeholder="Buscar por cualidades o lenguajes..." class="form-control" value="{{ request('query') }}">
        <button type="submit" class="btn btn-primary mt-2">Buscar</button>
    </form>

    <div class="row">
        @forelse ($practicas as $practica)
            <div class="col-md-4">
                <div class="card mb-4">
                    <div class="card-body">
                        <h5 class="card-title">{{ $practica->nombre }} {{ $practica->apellidos }}</h5>
                        <p><strong>Inicio Universidad:</strong> {{ $practica->fecha_inicio_universidad }}</p>
                        <p><strong>Reprobadas:</strong> {{ $practica->tiene_reprobadas ? 'Sí' : 'No' }} 
                            @if ($practica->tiene_reprobadas)
                                ({{ $practica->cantidad_reprobadas }})
                            @endif
                        </p>
                        <p><strong>Cualidades:</strong> {{ $practica->cualidades }}</p>
                        <p><strong>Lenguajes:</strong> {{ implode(', ', json_decode($practica->lenguajes_programacion ?? '[]')) }}</p>
                        <p><strong>Certificados:</strong>
                            <ul>
                                @foreach (json_decode($practica->certificados ?? '[]') as $cert)
                                    <li><a href="{{ asset($cert) }}" target="_blank">Ver certificado</a></li>
                                @endforeach
                            </ul>
                        </p>
                    </div>
                </div>
            </div>
        @empty
            <p>No se encontraron resultados.</p>
        @endforelse
    </div>
</div>
@endsection
