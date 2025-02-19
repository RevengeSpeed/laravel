<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
        Mi Perfil - 
        @if($user->formacionAcademica)
            {{ $user->formacionAcademica->Nombre }} {{ $user->formacionAcademica->Apellido }}
        @else
            Sin Información
        @endif
    </title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-4">
        <h2 class="mb-4">Mi Perfil</h2>
        <div class="card">
            <div class="card-body">
                @if ($user->profile_picture)
                    <img src="{{ $user->profile_picture }}" alt="Foto de {{ $user->formacionAcademica->Nombre ?? 'Sin Nombre' }} {{ $user->formacionAcademica->Apellido ?? '' }}" class="user-image mb-3">
                @else
                    <div class="img-placeholder mb-3">Sin Imagen</div>
                @endif
                @if($user->formacionAcademica)
                    <h5 class="card-title">{{ $user->formacionAcademica->Nombre }} {{ $user->formacionAcademica->Apellido }}</h5>
                    <p class="card-text"><strong>Email:</strong> {{ $user->email }}</p>
                    <p class="card-text"><strong>Nacionalidad:</strong> {{ $user->formacionAcademica->Nacionalidad ?? 'N/A' }}</p>
                    <p class="card-text"><strong>Teléfono:</strong> {{ $user->formacionAcademica->Telefono ?? 'N/A' }}</p>
                    <p class="card-text"><strong>Dirección:</strong> {{ $user->formacionAcademica->Direccion ?? 'N/A' }}</p>
                    <p class="card-text"><strong>Género:</strong> {{ $user->formacionAcademica->Genero ?? 'N/A' }}</p>
                    <p class="card-text"><strong>Fecha de Nacimiento:</strong> {{ $user->formacionAcademica->FechaNacimiento ?? 'N/A' }}</p>
                @else
                    <p class="card-text">Información de formación académica no disponible.</p>
                @endif

                @if($user->formAcadem)
                    <h5 class="mt-4">Formación Académica</h5>
                    <p class="card-text"><strong>Nivel Educativo:</strong> {{ $user->formAcadem->nivel_educativo ?? 'N/A' }}</p>
                    <p class="card-text"><strong>Institución:</strong> {{ $user->formAcadem->institucion ?? 'N/A' }}</p>
                    <p class="card-text"><strong>Carrera:</strong> {{ $user->formAcadem->carrera ?? 'N/A' }}</p>
                    <p class="card-text"><strong>Título:</strong> {{ $user->formAcadem->titulo ?? 'N/A' }}</p>
                    <p class="card-text"><strong>Certificaciones:</strong> {{ $user->formAcadem->certificaciones ?? 'N/A' }}</p>
                @else
                    <p class="card-text">Información de formación académica no disponible.</p>
                @endif

                @if($user->experienciaLaboral->count() > 0)
                    <h5 class="mt-4">Experiencia Laboral</h5>
                    @foreach($user->experienciaLaboral as $experiencia)
                        <p class="card-text"><strong>Título Empleado:</strong> {{ $experiencia->titulo_empleado ?? 'N/A' }}</p>
                        <p class="card-text"><strong>Empresa Actual:</strong> {{ $experiencia->empresa_actual ?? 'N/A' }}</p>
                        <p class="card-text"><strong>Cargo Actual:</strong> {{ $experiencia->cargo_actual ?? 'N/A' }}</p>
                        <p class="card-text"><strong>Descripción Responsabilidades:</strong> {{ $experiencia->descripcion_responsabilidades ?? 'N/A' }}</p>
                    @endforeach
                @else
                    <p class="card-text">No hay experiencia laboral disponible.</p>
                @endif
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>