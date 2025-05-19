@extends('layouts.app')

@section('styles')
    <style>
        @media (max-width: 767px) {
            .card.w-75 {
                width: 100% !important;
            }
        }
    </style>
    <!-- Tagify CSS -->
    <link rel="stylesheet" href="https://unpkg.com/@yaireo/tagify/dist/tagify.css">
@endsection

@section('content')
    <div class="container d-flex justify-content-center mt-5">
        <div class="card w-75 shadow-lg p-4">
            <div class="card-body">
                <h5 class="card-title text-center">Formulario de Prácticas</h5>
                <form method="POST" action="{{ route('vistas.createpracticas.store') }}" enctype="multipart/form-data">
                    @csrf

                    {{-- Nombre --}}
                    <div class="mb-3">
                        <label for="nombre" class="form-label">Nombre</label>
                        <input type="text" name="nombre" id="nombre"
                            class="form-control @error('nombre') is-invalid @enderror" value="{{ old('nombre') }}" required>
                        @error('nombre')<div class="invalid-feedback">{{ $message }}</div>@enderror
                    </div>

                    {{-- Apellidos --}}
                    <div class="mb-3">
                        <label for="apellidos" class="form-label">Apellidos</label>
                        <input type="text" name="apellidos" id="apellidos"
                            class="form-control @error('apellidos') is-invalid @enderror" value="{{ old('apellidos') }}"
                            required>
                        @error('apellidos')<div class="invalid-feedback">{{ $message }}</div>@enderror
                    </div>

                    {{-- Fecha de inicio en la universidad --}}
                    <div class="mb-3">
                        <label for="fecha_inicio_universidad" class="form-label">Fecha de Inicio (Universidad)</label>
                        <input type="date" name="fecha_inicio_universidad" id="fecha_inicio_universidad"
                            class="form-control @error('fecha_inicio_universidad') is-invalid @enderror"
                            value="{{ old('fecha_inicio_universidad') }}" required>
                        @error('fecha_inicio_universidad')<div class="invalid-feedback">{{ $message }}</div>@enderror
                    </div>

                    {{-- Materias reprobadas --}}
                    <div class="form-check mb-3">
                        <input type="checkbox" name="tiene_reprobadas" id="tiene_reprobadas" value="1"
                            class="form-check-input" {{ old('tiene_reprobadas') ? 'checked' : '' }}>
                        <label class="form-check-label" for="tiene_reprobadas">¿Tiene materias reprobadas?</label>
                    </div>

                    {{-- Número de reprobadas (oculto por defecto) --}}
                    <div class="mb-3" id="cantidad_reprobadas_group" style="display: none;">
                        <label for="cantidad_reprobadas" class="form-label">¿Cuántas materias reprobadas?</label>
                        <input type="number" min="1" name="cantidad_reprobadas" id="cantidad_reprobadas"
                            class="form-control @error('cantidad_reprobadas') is-invalid @enderror"
                            value="{{ old('cantidad_reprobadas') }}">
                        @error('cantidad_reprobadas')<div class="invalid-feedback">{{ $message }}</div>@enderror
                    </div>

                    {{-- Cualidades --}}
                    <div class="mb-3">
                        <label for="cualidades" class="form-label">Cualidades</label>
                        <textarea name="cualidades" id="cualidades" rows="3"
                            class="form-control @error('cualidades') is-invalid @enderror">{{ old('cualidades') }}</textarea>
                        @error('cualidades')<div class="invalid-feedback">{{ $message }}</div>@enderror
                    </div>

                    {{-- CAMBIAR POR HABILIDADES BLANDAS O COMPETENTES --}}
                    <div class="mb-3">
                    <label for="habilidades_blandas" class="form-label">Habilidades blandas <small>(separadas por
                            comas)</small></label>
                    <textarea name="habilidades_blandas" id="habilidades_blandas" rows="3"
                        class="form-control @error('habilidades_blandas') is-invalid @enderror"
                        placeholder="Ej: Comunicación, Liderazgo, Trabajo en equipo">{{ old('habilidades_blandas') }}</textarea>
                    @error('habilidades_blandas')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
            </div>


            {{-- Subir certificados --}}
            <div class="mb-3">
                <label for="certificados" class="form-label">Subir Certificados (PDF, JPG, PNG)</label>
                <input type="file" name="certificados[]" id="certificados" multiple
                    class="form-control @error('certificados') is-invalid @enderror">
                @error('certificados')<div class="invalid-feedback">{{ $message }}</div>@enderror
            </div>

            {{-- Botón de envío --}}
            <button type="submit" class="btn btn-primary btn-block mt-3">Enviar Práctica</button>
            </form>

            @if(session('status'))
                <div class="alert alert-success mt-3">{{ session('status') }}</div>
            @endif
        </div>
    </div>
    </div>
@endsection

@push('scripts')
    <!-- Tagify JS -->
    <script src="https://unpkg.com/@yaireo/tagify"></script>
    <script>
        // Inicializar Tagify sobre el <select multiple>
        var select = document.querySelector('#habilidades_blandas');
        new Tagify(select, {
            whitelist: [],       // puede llenarse con sugerencias si quieres
            dropdown: {
                enabled: 0,
                position: 'text'
            }
        });

        // Mostrar/ocultar campo de cantidad de reprobadas
        const chk = document.querySelector('#tiene_reprobadas');
        const grp = document.getElementById('cantidad_reprobadas_group');
        chk.addEventListener('change', () => {
            grp.style.display = chk.checked ? 'block' : 'none';
        });
        // Si vuelve con old valor
        if (chk.checked) grp.style.display = 'block';
    </script>
@endpush