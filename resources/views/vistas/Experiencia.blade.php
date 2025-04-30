@extends('layouts.app')

@section('content')

    <div class="container d-flex justify-content-center mt-5">
        <div class="card w-100 shadow-lg p-4">
            <div class="card-body">
                <h5 class="card-title text-center">Experiencia Laboral</h5>

                <!-- Formulario -->
                <form id="experiencia-form" method="POST" action="{{ route('experiencia-laboral.store') }}">
                    @csrf

                    <!-- Campo de título de empleo -->
                    <div class="form-group">
                        <label for="titulo-empleado">¿Estás Empleado Actualmente?</label>
                        <div class="radio-group">
                            <label><input type="radio" id="titulo-empleado" name="titulo_empleado" value="obtenido"> Sí</label>
                            <label><input type="radio" id="titulo-empleado" name="titulo_empleado" value="en-curso"> No</label>
                        </div>
                    </div>

                    <!-- Div para mostrar campos si está empleado -->
                    <div id="empleado-div">
                        <div class="form-group">
                            <label for="empresa-actual">Empresa Actual</label>
                            <input type="text" id="empresa-actual" name="empresa_actual" class="form-control">
                        </div>

                        <div class="form-group">
                            <label for="cargo-actual">Cargo Actual</label>
                            <input type="text" id="cargo-actual" name="cargo_actual" class="form-control">
                        </div>

                        <div class="form-group">
                            <label for="descripcion-responsabilidades">Descripción de Responsabilidades</label>
                            <input type="text" id="descripcion-responsabilidades" name="descripcion_responsabilidades" class="form-control">
                        </div>
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

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const radioButtons = document.querySelectorAll('input[name="titulo_empleado"]');

        radioButtons.forEach(function (radio) {
            radio.addEventListener('change', function () {
                const empleadoDiv = document.getElementById('empleado-div');

                if (radio.value === 'en-curso') {
                    empleadoDiv.style.display = 'none';  // Ocultar el div si no estás empleado
                } else {
                    empleadoDiv.style.display = 'block'; // Mostrar el div si estás empleado
                }
            });
        });
    });
</script>
