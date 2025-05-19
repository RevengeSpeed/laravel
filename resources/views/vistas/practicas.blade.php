@extends('layouts.app')

@section('content')
    <div class="container mt-4">
        <h2 class="mb-4">Lista de Practicantes</h2>

        <!-- Formulario de búsqueda -->
        <form action="{{ route('vistas.practicas') }}" method="GET" class="mb-4">
            <input type="text" name="query" placeholder="Buscar por cualidades o lenguajes..." class="form-control"
                value="{{ request('query') }}">
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

                            @php
                                // Manejo de habilidades_blandas JSON o texto plano separado por comas
                                $habilidades = [];
                                if (!empty($practica->habilidades_blandas)) {
                                    if (str_starts_with($practica->habilidades_blandas, '[')) {
                                        $habilidades = json_decode($practica->habilidades_blandas, true);
                                    } else {
                                        $habilidades = explode(',', $practica->habilidades_blandas);
                                        $habilidades = array_map('trim', $habilidades);
                                    }
                                }
                            @endphp
                            <p><strong>Habilidades:</strong>
                                @if (count($habilidades) > 0)
                                    {{ implode(', ', $habilidades) }}
                                @else
                                    <span style="color: red;">No disponibles</span>
                                @endif
                            </p>

                            @php
                                // Manejo certificados
                                $certificados = [];
                                if (!empty($practica->certificados)) {
                                    $certificados = json_decode($practica->certificados, true);
                                    if (!is_array($certificados)) {
                                        $certificados = [];
                                    }
                                }
                            @endphp

                    

                            <a href="{{ route('vistas.practicas.show', $practica->id) }}" class="btn btn-sm btn-info mt-2">
                                Ver más
                            </a>
                        </div>
                    </div>
                </div>
            @empty
                <p>No se encontraron resultados.</p>
            @endforelse
        </div>
    </div>
@endsection
