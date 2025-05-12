@extends('layouts.app')

@section('content')
    <div class="container d-flex justify-content-center mt-5">
        <div class="card w-75 shadow-lg p-4"> {{-- tarjeta al 75% --}}
            <div class="card-body">
                <h5 class="card-title text-center">Datos personales</h5>

                {{-- Row que centra su contenido --}}
                <div class="row justify-content-center">
                    {{-- Columna de ancho medio (ajústala: col-md-8, col-lg-6, etc.) --}}
                    <div class="col-12 col-md-8 col-lg-6">

                        <form method="POST" action="{{ route('vistas.store') }}">
                            @csrf

                            <div class="form-group">
                                <label for="nombre">Nombre</label>
                                <input type="text" name="Nombre" id="nombre" class="form-control form-control-sm" required>
                            </div>

                            <div class="form-group">
                                <label for="apellido">Apellido</label>
                                <input type="text" name="Apellido" id="apellido" class="form-control form-control-sm"
                                    required>
                            </div>

                            <div class="form-group">
                                <label for="nacionalidad">Nacionalidad</label>
                                <input type="text" name="Nacionalidad" id="nacionalidad"
                                    class="form-control form-control-sm" value="Mexicana" readonly>
                            </div>

                            <div class="form-group">
                                <label for="direccion">Dirección</label>
                                <input type="text" name="Direccion" id="direccion" class="form-control form-control-sm"
                                    required>
                            </div>

                            <div class="form-group">
                                <label for="correo">Correo</label>
                                <input type="email" name="Correo" id="correo" class="form-control form-control-sm" required>
                            </div>

                            <div class="form-group">
                                <label for="telefono">Teléfono</label>
                                <input type="text" name="Telefono" id="telefono" class="form-control form-control-sm"
                                    required>
                            </div>

                            <div class="form-group">
                                <label for="genero">Género</label>
                                <select name="Genero" id="genero" class="form-control form-control-sm" required>
                                    <option value="">Seleccione una opción</option>
                                    <option value="Hombre">Hombre</option>
                                    <option value="Mujer">Mujer</option>
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="nacimiento">Fecha de Nacimiento</label>
                                <input type="date" name="FechaNacimiento" id="nacimiento"
                                    class="form-control form-control-sm" required>
                            </div>

                            <button type="submit" class="btn btn-primary btn-block mt-3">
                                Siguiente
                            </button>
                        </form>

                        @if (session('success'))
                            <div class="alert alert-success mt-3">{{ session('success') }}</div>
                        @endif
                        @if (session('error'))
                            <div class="alert alert-danger mt-3">{{ session('error') }}</div>
                        @endif

                    </div>
                </div>
            </div>

@endsection

        @section('styles')
            <style>
                @media (max-width: 767px) {
                    .card.w-75 {
                        width: 100% !important;
                    }
                }
            </style>
        @endsection

