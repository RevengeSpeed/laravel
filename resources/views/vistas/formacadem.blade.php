@extends('layouts.app')
@section('content')

<div class="container d-flex justify-content-center mt-5">
    <div class="card w-100 shadow-lg p-4">
        <div class="card-body">
            <h5 class="card-title">Formación Academica</h5>
            <form method="POST" action="{{ route('formacadem.store') }}">
                @csrf

                <div class="form-container">
                    <div class="form-group">
                        <label for="nivel-educativo">Nivel Educativo Actual</label>
                        <select id="nivel-educativo" name="nivel_educativo" class="form-control">
                            <option value="">Seleccione una opción</option>
                            <option value="primaria" {{ old('nivel_educativo') == 'primaria' ? 'selected' : '' }}>Primaria
                            </option>
                            <option value="secundaria" {{ old('nivel_educativo') == 'secundaria' ? 'selected' : '' }}>
                                Secundaria
                            </option>
                            <option value="universidad" {{ old('nivel_educativo') == 'universidad' ? 'selected' : '' }}>
                                Universidad</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="institucion">Institución Educativa</label>
                        <input type="text" id="institucion" name="institucion" class="form-control">
                    </div>

                    <div class="form-group">
                        <label for="carrera">Carrera Universitaria</label>
                        <input type="text" id="carrera" name="carrera" class="form-control">
                    </div>

                    <div class="form-group">
                        <label for="titulo">Título Obtenido</label>
                        <div class="radio-group">
                            <label><input type="radio" name="titulo" value="obtenido"> Obtenido</label>
                            <label><input type="radio" name="titulo" value="en-curso"> En Curso</label>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="certificaciones">Certificaciones Académicas</label>
                        <input type="text" id="certificaciones" name="certificaciones" class="form-control">
                    </div>

                    <button type="submit" class="btn btn-primary">Siguiente</button>
                </div>
            </form>

            @if (session('success'))
                <div class="alert alert-success" role="alert">
                    {{ session('success') }}
                </div>
            @endif
            @if (session('error'))
                <div class="alert alert-danger" role="alert">
                    {{ session('error') }}
                </div>
            @endif
        </div>
    </div>
</div>
@endsection