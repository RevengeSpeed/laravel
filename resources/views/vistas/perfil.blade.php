@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Perfil de Usuario</h1>

        <h3>Datos Personales (Formación Académica)</h3>
        <ul>
            <li><strong>Nombre:</strong> {{ $user->formacionAcademica->Nombre ?? 'No definido' }}</li>
            <li><strong>Apellido:</strong> {{ $user->formacionAcademica->Apellido ?? 'No definido' }}</li>
            <li><strong>Correo:</strong> {{ $user->formacionAcademica->correo ?? 'No definido' }}</li>
            <li><strong>Teléfono:</strong> {{ $user->formacionAcademica->Telefono ?? 'No definido' }}</li>
            <li><strong>Dirección:</strong> {{ $user->formacionAcademica->Direccion ?? 'No definido' }}</li>
            <li><strong>Género:</strong> {{ $user->formacionAcademica->Genero ?? 'No definido' }}</li>
            <li><strong>Fecha de Nacimiento:</strong> {{ $user->formacionAcademica->FechaNacimiento ?? 'No definido' }}</li>
            <li><strong>Nacionalidad:</strong> {{ $user->formacionAcademica->Nacionalidad ?? 'No definido' }}</li>
        </ul>

        <h3>Formación Académica Específica (FormAcadem)</h3>
        <ul>
            <li><strong>Institución:</strong> {{ $user->formAcadem->institucion ?? 'No definido' }}</li>
            <li><strong>Carrera:</strong> {{ $user->formAcadem->carrera ?? 'No definido' }}</li>
            <li><strong>Título:</strong> {{ $user->formAcadem->titulo ?? 'No definido' }}</li>
            <li><strong>Certificaciones:</strong> {{ $user->formAcadem->certificaciones ?? 'No definido' }}</li>
        </ul>

        <h3>Experiencia Laboral</h3>
        <ul>
            <li><strong>Nivel Educativo:</strong> {{ $user->experienciaLaboral->nivel_educativo ?? 'No definido' }}</li>
            <li><strong>Título Empleado:</strong> {{ $user->experienciaLaboral->titulo_empleado ?? 'No definido' }}</li>
            <li><strong>Empresa Actual:</strong> {{ $user->experienciaLaboral->empresa_actual ?? 'No definido' }}</li>
            <li><strong>Cargo Actual:</strong> {{ $user->experienciaLaboral->cargo_actual ?? 'No definido' }}</li>
            <li><strong>Descripción Responsabilidades:</strong> {{ $user->experienciaLaboral->descripcion_responsabilidades ?? 'No definido' }}</li>
        </ul>

        <h3>Habilidades</h3>
        <ul>
            <li><strong>Habilidades Técnicas:</strong> {{ $user->habilidades->habilidades_tecnicas ?? 'No definido' }}</li>
            <li><strong>Habilidades Blandas:</strong> {{ $user->habilidades->habilidades_blandas ?? 'No definido' }}</li>
            <li><strong>Idiomas:</strong> {{ $user->habilidades->idiomas ?? 'No definido' }}</li>
        </ul>

        <h3>Documentos</h3>
        <ul>
            <li><strong>Perfil:</strong>
                @if($user->documento && $user->documento->perfil)
                    <img src="{{ asset('storage/' . $user->documento->perfil) }}" alt="Foto de perfil" width="150">
                @else
                    No definido
                @endif
            </li>
            <li><strong>Título:</strong>
                @if($user->documento && $user->documento->titulo)
                    <a href="{{ asset('storage/' . $user->documento->titulo) }}" target="_blank">Ver Título</a>
                @else
                    No definido
                @endif
            </li>
            <li><strong>Certificados:</strong>
                @if($user->documento && $user->documento->certificados && count($user->documento->certificados) > 0)
                    @foreach($user->documento->certificados as $certificado)
                        <a href="{{ asset('storage/' . $certificado) }}" target="_blank">Certificado</a><br>
                    @endforeach
                @else
                    No definido
                @endif
            </li>
            <li><strong>Certificados Externos:</strong>
                @if($user->documento && $user->documento->certificados_externos && count($user->documento->certificados_externos) > 0)
                    @foreach($user->documento->certificados_externos as $certificadoExt)
                        <a href="{{ asset('storage/' . $certificadoExt) }}" target="_blank">Certificado Externo</a><br>
                    @endforeach
                @else
                    No definido
                @endif
            </li>
        </ul>

    </div>
@endsection
