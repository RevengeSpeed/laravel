@extends('layouts.app')  <!-- Aquí extiendes el layout principal -->

@section('content')  <!-- Aquí empieza la sección de contenido que será insertado en el layout -->

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mi Perfil – {{ $user->name }}</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
        }
        .profile-card {
            max-width: 800px;
            margin: 50px auto;
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
        {{-- Imagen de perfil --}}
        @if($user->documento && $user->documento->perfil)
            <img src="{{ asset('storage/' . $user->documento->perfil) }}" alt="Foto de {{ $user->name }}" class="profile-img">
        @else
            <div class="profile-img bg-secondary text-white d-flex align-items-center justify-content-center">
                <i class="bi bi-person-fill" style="font-size: 3rem;"></i>
            </div>
        @endif

        {{-- Nombre y correo --}}
        <h2>{{ $user->formacionAcademica->Nombre ?? $user->name }} {{ $user->formacionAcademica->Apellido ?? '' }}</h2>
        <p class="text-muted">{{ $user->email }}</p>

        {{-- Información Personal --}}
        <div class="text-start mt-4">
            <h5 class="section-title">Información Personal</h5>
            <p><strong>Nacionalidad:</strong> {{ $user->formacionAcademica->Nacionalidad ?? 'N/A' }}</p>
            <p><strong>Teléfono:</strong> {{ $user->formacionAcademica->Telefono ?? 'N/A' }}</p>
            <p><strong>Dirección:</strong> {{ $user->formacionAcademica->Direccion ?? 'N/A' }}</p>
            <p><strong>Género:</strong> {{ $user->formacionAcademica->Genero ?? 'N/A' }}</p>
            <p><strong>Fecha de Nacimiento:</strong> {{ $user->formacionAcademica->FechaNacimiento ?? 'N/A' }}</p>
        </div>

        {{-- Formación Académica --}}
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

        {{-- Habilidades --}}
        @if($user->habilidades)
            <div class="text-start mt-4">
                <h5 class="section-title">Habilidades</h5>
                <p><strong>Habilidades Técnicas:</strong> {{ $user->habilidades->habilidades_tecnicas ?? 'N/A' }}</p>
                <p><strong>Habilidades Blandas:</strong> {{ $user->habilidades->habilidades_blandas ?? 'N/A' }}</p>
                <p><strong>Idiomas:</strong> {{ $user->habilidades->idiomas ?? 'N/A' }}</p>
            </div>
        @endif

        {{-- Experiencia Laboral --}}
        @if($user->experienciaLaboral && $user->experienciaLaboral->count() > 0)
            <div class="text-start mt-4">
                <h5 class="section-title">Experiencia Laboral</h5>
                @foreach($user->experienciaLaboral as $experiencia)
                    <p><strong>Puesto:</strong> {{ $experiencia->titulo_empleado ?? 'N/A' }}</p>
                    <p><strong>Empresa:</strong> {{ $experiencia->empresa_actual ?? 'N/A' }}</p>
                    <p><strong>Cargo:</strong> {{ $experiencia->cargo_actual ?? 'N/A' }}</p>
                    <p><strong>Responsabilidades:</strong> {{ $experiencia->descripcion_responsabilidades ?? 'N/A' }}</p>
                    @if (! $loop->last)
                        <hr>
                    @endif
                @endforeach
            </div>
        @endif

        {{-- Documentos --}}
        @if($user->documento)
            <div class="text-start mt-4">
                <h5 class="section-title">Documentos</h5>
                <ul>
                    @if($user->documento->titulo)
                        <li>
                            <a href="{{ asset('storage/' . $user->documento->titulo) }}" target="_blank">Ver Título Universitario</a>
                        </li>
                    @endif

                    @if($user->documento->certificados)
                        @foreach($user->documento->certificados as $cert)
                            <li>
                                <a href="{{ asset('storage/' . $cert) }}" target="_blank">Ver Certificado</a>
                            </li>
                        @endforeach
                    @endif

                    @if($user->documento->certificados_externos)
                        @foreach($user->documento->certificados_externos as $certExt)
                            <li>
                                <a href="{{ asset('storage/' . $certExt) }}" target="_blank">Ver Certificado Externo</a>
                            </li>
                        @endforeach
                    @endif
                </ul>
            </div>
        @endif
    </div>

    <div class="container text-center mt-4">
        <a href="{{ route('home') }}" class="btn btn-secondary">Volver al inicio</a>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
