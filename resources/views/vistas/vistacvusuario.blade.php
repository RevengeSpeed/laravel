<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mi Perfil - {{ $user->formacionAcademica->Nombre ?? 'Sin Información' }} {{ $user->formacionAcademica->Apellido ?? '' }}</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
        }
        .profile-card {
            max-width: 600px;
            margin: auto;
            margin-top: 50px;
            background: #fff;
            border-radius: 15px;
            box-shadow: 0 4px 8px rgba(0,0,0,0.1);
            padding: 30px;
        }
        .profile-img {
            width: 150px;
            height: 150px;
            object-fit: cover;
            border-radius: 50%;
            border: 5px solid #fff;
            box-shadow: 0 2px 6px rgba(0,0,0,0.1);
            margin-bottom: 20px;
        }
        .section-title {
            border-bottom: 2px solid #dee2e6;
            padding-bottom: 5px;
            margin-bottom: 15px;
            font-weight: bold;
            color: #343a40;
        }
    </style>
</head>
<body>
    <div class="profile-card text-center">
        @if ($user->profile_picture)
            <img src="{{ $user->profile_picture }}" alt="Foto de {{ $user->formacionAcademica->Nombre ?? 'Sin Nombre' }} {{ $user->formacionAcademica->Apellido ?? '' }}" class="profile-img">
        @else
            <div class="profile-img bg-secondary text-white d-flex align-items-center justify-content-center">
                <i class="bi bi-person-fill" style="font-size: 3rem;"></i>
            </div>
        @endif

        <h2>{{ $user->formacionAcademica->Nombre ?? 'Sin Nombre' }} {{ $user->formacionAcademica->Apellido ?? '' }}</h2>
        <p class="text-muted">{{ $user->email }}</p>

        <div class="text-start mt-4">
            <h5 class="section-title">Información Personal</h5>
            <p><strong>Nacionalidad:</strong> {{ $user->formacionAcademica->Nacionalidad ?? 'N/A' }}</p>
            <p><strong>Teléfono:</strong> {{ $user->formacionAcademica->Telefono ?? 'N/A' }}</p>
            <p><strong>Dirección:</strong> {{ $user->formacionAcademica->Direccion ?? 'N/A' }}</p>
            <p><strong>Género:</strong> {{ $user->formacionAcademica->Genero ?? 'N/A' }}</p>
            <p><strong>Fecha de Nacimiento:</strong> {{ $user->formacionAcademica->FechaNacimiento ?? 'N/A' }}</p>
        </div>

        @if($user->formAcadem)
            <div class="text-start mt-4">
                <h5 class="section-title">Formación Académica</h5>
                <p><strong>Nivel Educativo:</strong> {{ $user->formAcadem->nivel_educativo ?? 'N/A' }}</p>
                <p><strong>Institución:</strong> {{ $user->formAcadem->institucion ?? 'N/A' }}</p>
                <p><strong>Carrera:</strong> {{ $user->formAcadem->carrera ?? 'N/A' }}</p>
                <p><strong>Título:</strong> {{ $user->formAcadem->titulo ?? 'N/A' }}</p>
                <p><strong>Certificaciones:</strong> {{ $user->formAcadem->certificaciones ?? 'N/A' }}</p>
            </div>
        @endif

        @if($user->experienciaLaboral->count() > 0)
            <div class="text-start mt-4">
                <h5 class="section-title">Experiencia Laboral</h5>
                @foreach($user->experienciaLaboral as $experiencia)
                    <p><strong>Título Empleado:</strong> {{ $experiencia->titulo_empleado ?? 'N/A' }}</p>
                    <p><strong>Empresa Actual:</strong> {{ $experiencia->empresa_actual ?? 'N/A' }}</p>
                    <p><strong>Cargo Actual:</strong> {{ $experiencia->cargo_actual ?? 'N/A' }}</p>
                    <p><strong>Descripción Responsabilidades:</strong> {{ $experiencia->descripcion_responsabilidades ?? 'N/A' }}</p>
                    <hr>
                @endforeach
            </div>
        @endif
    </div>

    <a href="{{ route('home') }}" class="btn btn-secondary">Volver al inicio</a>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>