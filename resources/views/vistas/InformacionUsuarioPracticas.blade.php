@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <h2 class="mb-4">Información del practicante</h2>
    <div class="card shadow-sm rounded">
        <div class="card-body">
            <h5 class="card-title">{{ $practica->nombre }} {{ $practica->apellidos }}</h5>

            <p><strong>Fecha de inicio en la universidad:</strong> {{ $practica->fecha_inicio_universidad }}</p>

            <p><strong>¿Tiene materias reprobadas?:</strong> {{ $practica->tiene_reprobadas ? 'Sí' : 'No' }}</p>
            @if(isset($practica->cantidad_reprobadas))
                <p><strong>Cantidad de reprobadas:</strong> {{ $practica->cantidad_reprobadas }}</p>
            @endif

            @if(!empty($practica->cualidades))
                <p><strong>Cualidades:</strong> {{ $practica->cualidades }}</p>
            @endif

            @if(!empty($practica->lenguajes_programacion))
                <p><strong>Lenguajes de programación:</strong>
                    @if(is_array($practica->lenguajes_programacion))
                        {{ implode(', ', $practica->lenguajes_programacion) }}
                    @else
                        {{ $practica->lenguajes_programacion }}
                    @endif
                </p>
            @endif

            @if(!empty($practica->certificados))
                <p><strong>Certificados:</strong></p>
                @php
                    $certificados = is_array($practica->certificados) ? $practica->certificados : json_decode($practica->certificados, true);
                @endphp
                @if(is_array($certificados))
                    <ul>
                        @foreach($certificados as $cert)
                            <li>
                                <a href="{{ asset('storage/' . $cert) }}" target="_blank" rel="noopener noreferrer">Ver certificado</a>
                            </li>
                        @endforeach
                    </ul>
                @else
                    <p>{{ $practica->certificados }}</p>
                @endif
            @endif

            <a href="{{ route('vistas.practicas') }}" class="btn btn-secondary mt-3">Volver a la lista</a>
        </div>
    </div>
</div>
@endsection
