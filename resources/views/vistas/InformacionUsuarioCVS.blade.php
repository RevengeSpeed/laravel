{{-- resources/views/vistas/informacion_usuario_cvs.blade.php --}}
@extends('layouts.app')

@section('styles')
    <style>
        body {
            background-color: #f8f9fa;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            color: #343a40;
        }

        .profile-card {
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            border: none;
            border-radius: 10px;
            overflow: hidden;
        }

        .section-title {
            margin-top: 2rem;
            font-size: 1.5rem;
            border-bottom: 2px solid #0d6efd;
            padding-bottom: 0.5rem;
        }
    </style>
@endsection

@section('content')
    <div class="container mt-5 mb-5">
        <h2 class="mb-4 text-center">Información del egresado</h2>

        <div class="row g-4">
            {{-- Columna izquierda: foto y datos básicos --}}
            <div class="col-md-4">
                <div class="card profile-card text-center p-3">

                    @php
                        // Elige la ruta de perfil: documento o profile_picture
                        $perfilPath = optional($user->documento)->perfil ?: $user->profile_picture;
                    @endphp

                    @if($perfilPath)
                        <img src="{{ asset('storage/' . $perfilPath) }}"
                            alt="Foto de perfil de {{ $user->formacionAcademica->Nombre ?? 'Usuario' }}"
                            class="rounded-circle mb-3 img-fluid" style="width:120px; height:120px; object-fit:cover;">
                    @else
                        <div class="rounded-circle bg-secondary d-flex align-items-center justify-content-center mb-3"
                            style="width:120px; height:120px; color:#fff;">
                            Sin Imagen
                        </div>
                    @endif

                    @if($user->formacionAcademica)
                        <h5 class="card-title">
                            {{ $user->formacionAcademica->Nombre }}
                            {{ $user->formacionAcademica->Apellido }}
                        </h5>
                        <p class="mb-1"><i class="fa fa-envelope me-2"></i>{{ $user->email }}</p>
                        <p class="mb-1"><i class="fa fa-globe me-2"></i>{{ $user->formacionAcademica->Nacionalidad ?? 'N/A' }}
                        </p>
                        <p class="mb-1"><i class="fa fa-phone me-2"></i>{{ $user->formacionAcademica->Telefono ?? 'N/A' }}</p>
                        <p class="mb-1"><i class="fa fa-home me-2"></i>{{ $user->formacionAcademica->Direccion ?? 'N/A' }}</p>
                        <p class="mb-1"><i class="fa fa-venus-mars me-2"></i>{{ $user->formacionAcademica->Genero ?? 'N/A' }}
                        </p>
                        <p class="mb-0"><i
                                class="fa fa-birthday-cake me-2"></i>{{ $user->formacionAcademica->FechaNacimiento ?? 'N/A' }}
                        </p>
                    @else
                        <p>Información básica no disponible.</p>
                    @endif
                </div>
            </div>

            {{-- Columna derecha: formación y experiencia --}}
            <div class="col-md-8">
                <div class="card profile-card p-4">
                    @if($user->formAcadem)
                        <h2 class="section-title">
                            <i class="fa fa-graduation-cap me-2 text-primary"></i>
                            Formación Académica
                        </h2>
                        <p><strong>Nivel Educativo:</strong> {{ $user->formAcadem->nivel_educativo ?? 'N/A' }}</p>
                        <p><strong>Institución:</strong> {{ $user->formAcadem->institucion ?? 'N/A' }}</p>
                        <p><strong>Carrera:</strong> {{ $user->formAcadem->carrera ?? 'N/A' }}</p>
                        <p><strong>Título:</strong> {{ $user->formAcadem->titulo ?? 'N/A' }}</p>
                        <p><strong>Certificaciones:</strong> {{ $user->formAcadem->certificaciones ?? 'N/A' }}</p>
                    @else
                        <h5 class="section-title text-muted">Formación Académica no disponible</h5>
                    @endif

                    @if($user->experienciaLaboral)
                        <h5 class="section-title">
                            <i class="fa fa-briefcase me-2 text-primary"></i>
                            Experiencia Laboral
                        </h5>
                        <div class="mb-3">
                            <p class="mb-1"><strong>Puesto:</strong> {{ $user->experienciaLaboral->titulo_empleado ?? 'N/A' }}
                            </p>
                            <p class="mb-1"><strong>Empresa:</strong> {{ $user->experienciaLaboral->empresa_actual ?? 'N/A' }}
                            </p>
                            <p class="mb-1"><strong>Cargo:</strong> {{ $user->experienciaLaboral->cargo_actual ?? 'N/A' }}</p>
                            <p class="mb-0"><strong>Responsabilidades:</strong>
                                {{ $user->experienciaLaboral->descripcion_responsabilidades ?? 'N/A' }}</p>
                        </div>
                    @else
                        <h5 class="section-title text-muted">No hay experiencia laboral</h5>
                    @endif

                    {{-- Habilidades --}}
                    @if($user->habilidades)
                        <h5 class="section-title">
                            <i class="fa fa-lightbulb me-2 text-primary"></i>
                            Habilidades
                        </h5>
                        <p><strong>Habilidades Técnicas:</strong> {{ $user->habilidades->habilidades_tecnicas ?? 'N/A' }}</p>
                        <p><strong>Habilidades Blandas:</strong> {{ $user->habilidades->habilidades_blandas ?? 'N/A' }}</p>
                        <p><strong>Idiomas:</strong> {{ $user->habilidades->idiomas ?? 'N/A' }}</p>
                    @else
                        <h5 class="section-title text-muted">Habilidades no registradas</h5>
                    @endif

                    {{-- Documentos --}}
                    @if($user->documento)
                        <h5 class="section-title">
                            <i class="fa fa-folder-open me-2 text-primary"></i>
                            Documentos
                        </h5>
                        @if($user->documento && $user->documento->titulo)
                            <p><strong>Título:</strong>
                                <a href="{{ asset('storage/' . $user->documento->titulo) }}" target="_blank">
                                    Ver Titulo
                                </a>
                            </p>
                        @else
                            <p><strong>Título:</strong> No disponible</p>
                        @endif


                        @if($user->documento->certificados && is_array($user->documento->certificados))
                            <p><strong>Certificados:</strong></p>
                            <ul>
                                @foreach($user->documento->certificados as $cert)
                                    <li>
                                        <a href="{{ asset('storage/' . $cert) }}" target="_blank">Ver Certificado</a>
                                    </li>
                                @endforeach
                            </ul>
                        @endif

                        @if($user->documento->certificados_externos && is_array($user->documento->certificados_externos))
                            <p><strong>Certificados Externos:</strong></p>
                            <ul>
                                @foreach($user->documento->certificados_externos as $cert_ext)
                                    <li>
                                        <a href="{{ asset('storage/' . $cert_ext) }}" target="_blank">Ver Certificado Externo</a>
                                    </li>
                                @endforeach
                            </ul>
                        @endif
                    @else
                        <h5 class="section-title text-muted">Documentos no disponibles</h5>
                    @endif

                </div>
            </div>
        </div>

        <div class="mt-4">
            <a href="{{ route('admin.dashboard') }}" class="btn btn-secondary">
                <i class="fa fa-arrow-left me-1"></i> Volver al Dashboard
            </a>
        </div>
    </div>
@endsection