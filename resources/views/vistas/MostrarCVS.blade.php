@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <h2 class="mb-4">Lista de Egresados</h2>
    
    <!-- Formulario de Búsqueda -->
    <form action="{{ route('vistas.MostrarCVS') }}" method="GET" class="mb-4">
        <input type="text" name="query" placeholder="Buscar por habilidades..." class="form-control" value="{{ request('query') }}">
        <button type="submit" class="btn btn-primary mt-2">Buscar</button>
    </form>

    @if(isset($habilidades) && $habilidades->isNotEmpty())
        <h4>Resultados de la búsqueda:</h4>
        <div class="row">
            @foreach ($habilidades as $h)
                <div class="col-md-4">
                    <div class="card mb-4">
                        <div class="card-body">
                            {{-- Habilidades Técnicas --}}
                            @if(! empty($h->habilidades_tecnicas))
                                <h5 class="card-title">Habilidades Técnicas: {{ $h->habilidades_tecnicas }}</h5>
                            @endif

                            {{-- Habilidades Blandas --}}
                            @if(! empty($h->habilidades_blandas))
                                <p class="card-text"><strong>Blandas:</strong> {{ $h->habilidades_blandas }}</p>
                            @endif

                            {{-- Idiomas --}}
                            @if(! empty($h->idiomas))
                                <p class="card-text"><strong>Idiomas:</strong> {{ $h->idiomas }}</p>
                            @endif
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    @else
        <h4>Lista de Usuarios:</h4>
        <div class="row">
            @foreach ($users as $user)
               
                @php
                    $fa = optional($user->formacionacademica);
                    $hc = optional($user->habilidades);
                    $hasAny = $fa->Nombre || $fa->Apellido || $fa->carrera || $hc->habilidades_tecnicas || $hc->idiomas;
                @endphp
                @if($hasAny)
                    <div class="col-md-4">
                        <div class="card mb-4">
                            <div class="card-body">
                                {{-- Nombre completo --}}
                                @if($fa->Nombre || $fa->Apellido)
                                    <h5 class="card-title mt-2">
                                        {{ trim($fa->Nombre . ' ' . $fa->Apellido) }}
                                    </h5>
                                @endif

                                {{-- Carrera --}}
                                @if(! empty($fa->carrera))
                                    <p class="card-text"><strong>Carrera:</strong> {{ $fa->carrera }}</p>
                                @endif

                                {{-- Habilidades Técnicas --}}
                                @if(! empty($hc->habilidades_tecnicas))
                                    <p class="card-text"><strong>Habilidades Técnicas:</strong> {{ $hc->habilidades_tecnicas }}</p>
                                @endif

                                {{-- Idiomas --}}
                                @if(! empty($hc->idiomas))
                                    <p class="card-text"><strong>Idiomas:</strong> {{ $hc->idiomas }}</p>
                                @endif

                                <a href="{{ route('vistas.InformacionUsuarioCVS', $user->id) }}"
                                   class="btn btn-primary">
                                   Mostrar toda la información
                                </a>
                            </div>
                        </div>
                    </div>
                @endif
            @endforeach
        </div>
    @endif
</div>
@endsection

@section('styles')
<style>
    .card {
        margin-bottom: 20px;
    }
</style>
@endsection
8001232222