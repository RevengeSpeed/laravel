@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <h2 class="mb-4">Lista de Egresados</h2>
    
    <!-- Formulario de Búsqueda -->
    <form action="{{ route('vistas.MostrarCVS') }}" method="GET" class="mb-4">
        <input type="text" name="query" placeholder="Buscar por habilidades..." class="form-control" value="{{ request()->input('query') }}">
        <button type="submit" class="btn btn-primary mt-2">Buscar</button>
    </form>

    @if(isset($habilidades) && count($habilidades) > 0)
        <h4>Resultados de la búsqueda:</h4>
        <div class="row">
            @foreach ($habilidades as $habilidad)
                <div class="col-md-4">
                    <div class="card mb-4">
                        <div class="card-body">
                            <h5 class="card-title">Habilidades Técnicas: {{ $habilidad->habilidades_tecnicas ?? 'N/A' }}</h5>
                            <p class="card-text"><strong>Blandas:</strong> {{ $habilidad->habilidades_blandas ?? 'N/A' }}</p>
                            <p class="card-text"><strong>Idiomas:</strong> {{ $habilidad->idiomas ?? 'N/A' }}</p>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    @else
        <h4>Lista de Usuarios:</h4>
        <div class="row">
            @foreach ($users as $user)
                <div class="col-md-4">
                    <div class="card mb-4">
                        <div class="card-body">
                            @if ($user->profile_picture)
                                <img src="{{ $user->profile_picture }}" alt="Foto de {{ $user->formacionacademica->Nombre ?? 'Usuario' }} {{ $user->formacionacademica->Apellido ?? '' }}" class="user-image">
                            @else
                                <div class="img-placeholder">Sin Imagen</div>
                            @endif
                            <h5 class="card-title mt-2">{{ $user->formacionacademica->Nombre ?? 'Nombre no disponible' }} {{ $user->formacionacademica->Apellido ?? '' }}</h5>
                            <p class="card-text"><strong>Carrera:</strong> {{ $user->formAcadem->carrera ?? 'N/A' }}</p>
                            <p class="card-text"><strong>Habilidades Técnicas:</strong> {{ $user->habilidades->habilidades_tecnicas ?? 'N/A' }}</p>
                            <p class="card-text"><strong>Idiomas:</strong> {{ $user->habilidades->idiomas ?? 'N/A' }}</p>
                            <a href="{{ route('vistas.InformacionUsuarioCVS', $user->id) }}" class="btn btn-primary">Mostrar toda la información</a>
                        </div>
                    </div>
                </div>
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
    .user-image {
        width: 100%;
        height: auto;
    }
    .img-placeholder {
        width: 100%;
        height: 200px;
        background-color: #e9ecef;
        display: flex;
        align-items: center;
        justify-content: center;
    }
</style>
@endsection
