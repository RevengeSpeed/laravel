@extends('layouts.app')

@section('content')

    <div class="container d-flex justify-content-center mt-5">
        <div class="card w-100 shadow-lg p-4">
            <div class="card-body">
                <h5 class="card-title text-center">Datos personales</h5>

                <!-- Formulario -->
                <form method="POST" action="{{ route('vistas.store') }}">
                    @csrf

                    <!-- Campo de nombre -->
                    <div class="form-group">
                        <label for="nombre">Nombre</label>
                        <input type="text" name="Nombre" id="nombre" class="form-control" required>
                    </div>

                    <!-- Campo de apellido -->
                    <div class="form-group">
                        <label for="apellido">Apellido</label>
                        <input type="text" name="Apellido" id="apellido" class="form-control" required>
                    </div>

                    <div class="form-group">
                        <label for="nacionalidad">Nacionalidad</label>
                        <input type="text" name="Nacionalidad" id="nacionalidad" class="form-control" value="Mexicana"
                            readonly>
                    </div>


                    <!-- Campo de dirección -->
                    <div class="form-group">
                        <label for="direccion">Dirección</label>
                        <input type="text" name="Direccion" id="direccion" class="form-control" required>
                    </div>

                    <!-- Campo de correo -->
                    <div class="form-group">
                        <label for="correo">Correo</label>
                        <input type="email" name="Correo" id="correo" class="form-control" required>
                    </div>

                    <!-- Campo de teléfono -->
                    <div class="form-group">
                        <label for="telefono">Teléfono</label>
                        <input type="text" name="Telefono" id="telefono" class="form-control" required>
                    </div>

                    <div class="form-group">
                        <label for="genero">Género</label>
                        <select name="Genero" id="genero" class="form-control" required>
                            <option value="">Seleccione una opción</option>
                            <option value="Hombre">Hombre</option>
                            <option value="Mujer">Mujer</option>
                        </select>
                    </div>


                    <!-- Campo de fecha de nacimiento -->
                    <div class="form-group">
                        <label for="nacimiento">Fecha de Nacimiento</label>
                        <input type="date" name="FechaNacimiento" id="nacimiento" class="form-control" required>
                    </div>

                    <!-- Botón de envío -->
                    <button type="submit" class="btn btn-primary btn-block">Siguiente</button>
                </form>

                <!-- Mensajes de éxito o error -->
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