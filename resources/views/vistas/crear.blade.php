@extends('layouts.app')
@section('content')

<div class="container d-flex justify-content-center mt-5">
    <div class="card w-100 shadow-lg p-4">
        <div class="card-body">
            <h5 class="card-title text-center">Datos personales</h5>
            <form method="POST" action="{{ route('vistas.store') }}">
                @csrf
                <div class="form-group">
                    <label for="nombre">Nombre</label>
                    <input type="text" name="Nombre" id="nombre" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="Apellido">Apellido</label>
                    <input type="text" name="Apellido" id="Apellido" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="Nacionalidad">Nacionalidad</label>
                    <input type="text" name="Nacionalidad" id="Nacionalidad" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="Direccion">Dirección</label>
                    <input type="text" name="Direccion" id="Direccion" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="Correo">Correo</label>
                    <input type="email" name="Correo" id="Correo" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="Telefono">Teléfono</label>
                    <input type="text" name="Telefono" id="Telefono" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="Genero">Género</label>
                    <input type="text" name="Genero" id="Genero" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="Nacimiento">Fecha de Nacimiento</label>
                    <input type="date" name="FechaNacimiento" id="Nacimiento" class="form-control" required>
                </div>
                <button type="submit" class="btn btn-primary btn-block">Siguiente</button>
            </form>

            @if (session('success'))
                <div class="alert alert-success mt-3" role="alert">
                    {{ session('success') }}
                </div>
            @endif
            @if (session('error'))
                <div class="alert alert-danger mt-3" role="alert">
                    {{ session('error') }}
                </div>
            @endif
        </div>
    </div>
</div>


@endsection