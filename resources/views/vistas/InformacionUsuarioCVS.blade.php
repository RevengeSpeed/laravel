<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Información de {{ $user->name }}</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-4">
        <h2 class="mb-4">Información Completa del Usuario</h2>
        <div class="card">
            <div class="card-body">
                @if ($user->profile_picture)
                    <img src="{{ $user->profile_picture }}" alt="Foto de {{ $user->name }}" class="user-image mb-3">
                @else
                    <div class="img-placeholder mb-3">Sin Imagen</div>
                @endif
                <h5 class="card-title">{{ $user->name }}</h5>
                <p class="card-text"><strong>Email:</strong> {{ $user->email }}</p>
                <p class="card-text"><strong>Nacionalidad:</strong> {{ $user->formacionAcademica->nacionalidad ?? 'N/A' }}</p>
                <p class="card-text"><strong>Teléfono:</strong> {{ $user->formacionAcademica->telefono ?? 'N/A' }}</p>
                <p class="card-text"><strong>Dirección:</strong> {{ $user->formacionAcademica->direccion ?? 'N/A' }}</p>
                <p class="card-text"><strong>Género:</strong> {{ $user->formacionAcademica->genero ?? 'N/A' }}</p>
                <p class="card-text"><strong>Fecha de Nacimiento:</strong> {{ $user->formacionAcademica->fecha_nacimiento ?? 'N/A' }}</p>
                <p class="card-text"><strong>Nivel Educativo:</strong> {{ $user->formAcadem->nivel_educativo ?? 'N/A' }}</p>
                <p class="card-text"><strong>Institución:</strong> {{ $user->formAcadem->institucion ?? 'N/A' }}</p>
                <p class="card-text"><strong>Carrera:</strong> {{ $user->formAcadem->carrera ?? 'N/A' }}</p>
                <p class="card-text"><strong>Título:</strong> {{ $user->formAcadem->titulo ?? 'N/A' }}</p>
                <p class="card-text"><strong>Certificaciones:</strong> {{ $user->formAcadem->certificaciones ?? 'N/A' }}</p>
                <p class="card-text"><strong>Habilidades Técnicas:</strong> {{ $user->habilidades->habilidades_tecnicas ?? 'N/A' }}</p>
                <p class="card-text"><strong>Habilidades Blandas:</strong> {{ $user->habilidades->habilidades_blandas ?? 'N/A' }}</p>
                <p class="card-text"><strong>Idiomas:</strong> {{ $user->habilidades->idiomas ?? 'N/A' }}</p>
                <p class="card-text"><strong>Título Empleado:</strong> {{ $user->experienciaLaboral->titulo_empleado ?? 'N/A' }}</p>
                <p class="card-text"><strong>Empresa Actual:</strong> {{ $user->experienciaLaboral->empresa_actual ?? 'N/A' }}</p>
                <p class="card-text"><strong>Cargo Actual:</strong> {{ $user->experienciaLaboral->cargo_actual ?? 'N/A' }}</p>
                <p class="card-text"><strong>Descripción Responsabilidades:</strong> {{ $user->experienciaLaboral->descripcion_responsabilidades ?? 'N/A' }}</p>
                <a href="{{ route('vistas.MostrarCVS') }}" class="btn btn-secondary mt-3">Volver a la lista</a>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>