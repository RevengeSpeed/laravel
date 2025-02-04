@extends('layouts.app')
@section('content')

<div class="card-body">
    <h5 class="card-title">Experiencia Laboral</h5>
    <form id="experiencia-form" method="POST" action="{{ route('experiencia-laboral.store') }}">
        @csrf

        <div class="form-group">
            <label for="titulo-empleado">¿Estás Empleado Actualmente?</label>
            <div class="radio-group">
                <label><input type="radio" id="titulo-empleado" name="titulo_empleado" value="obtenido"> Si</label>
                <label><input type="radio" id="titulo-empleado" name="titulo_empleado" value="en-curso"> No</label>
            </div>
        </div>

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
                <input type="text" id="descripcion-responsabilidades" name="descripcion_responsabilidades"
                    class="form-control">
            </div>
        </div>

        <button type="submit" class="btn btn-primary">Siguiente</button>
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
