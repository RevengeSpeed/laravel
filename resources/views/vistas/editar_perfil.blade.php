@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Editar Perfil</h2>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
              @foreach ($errors->all() as $error)
                  <li>{{ $error }}</li>
              @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('perfil.update') }}" method="POST" enctype="multipart/form-data">
        @csrf
      

    
        <h4>Datos Personales</h4>
        <div class="form-group">
            <label>Nombre</label>
            <input type="text" name="Nombre" class="form-control" value="{{ old('Nombre', $user->formacionAcademica->Nombre ?? '') }}">
        </div>

        <div class="form-group">
            <label>Apellido</label>
            <input type="text" name="Apellido" class="form-control" value="{{ old('Apellido', $user->formacionAcademica->Apellido ?? '') }}">
        </div>

        <div class="form-group">
            <label>Nacionalidad</label>
            <input type="text" name="Nacionalidad" class="form-control" value="{{ old('Nacionalidad', $user->formacionAcademica->Nacionalidad ?? '') }}">
        </div>

        <div class="form-group">
            <label>Dirección</label>
            <input type="text" name="Direccion" class="form-control" value="{{ old('Direccion', $user->formacionAcademica->Direccion ?? '') }}">
        </div>

        <div class="form-group">
            <label>Correo</label>
            <input type="email" name="correo" class="form-control" value="{{ old('correo', $user->formacionAcademica->correo ?? '') }}">
        </div>

        <div class="form-group">
            <label>Teléfono</label>
            <input type="text" name="Telefono" class="form-control" value="{{ old('Telefono', $user->formacionAcademica->Telefono ?? '') }}">
        </div>

        <div class="form-group">
            <label>Género</label>
            <input type="text" name="Genero" class="form-control" value="{{ old('Genero', $user->formacionAcademica->Genero ?? '') }}">
        </div>

        <div class="form-group">
            <label>Fecha de Nacimiento</label>
            <input type="date" name="FechaNacimiento" class="form-control" value="{{ old('FechaNacimiento', $user->formacionAcademica->FechaNacimiento ?? '') }}">
        </div>

        <hr>
        <h4>Formación Académica</h4>
        <div class="form-group">
            <label>Institución</label>
            <input type="text" name="institucion" class="form-control" value="{{ old('institucion', $user->formAcadem->institucion ?? '') }}">
        </div>

        <div class="form-group">
            <label>Carrera</label>
            <input type="text" name="carrera" class="form-control" value="{{ old('carrera', $user->formAcadem->carrera ?? '') }}">
        </div>

        <div class="form-group">
            <label>Título</label>
            <select name="titulo" class="form-control">
                <option value="">Seleccione</option>
                <option value="obtenido" {{ old('titulo', $user->formAcadem->titulo ?? '') == 'obtenido' ? 'selected' : '' }}>Obtenido</option>
                <option value="en-curso" {{ old('titulo', $user->formAcadem->titulo ?? '') == 'en-curso' ? 'selected' : '' }}>En curso</option>
            </select>
        </div>

        <div class="form-group">
            <label>Certificaciones</label>
            <textarea name="certificaciones" class="form-control">{{ old('certificaciones', $user->formAcadem->certificaciones ?? '') }}</textarea>
        </div>

        <hr>
        <h4>Experiencia Laboral</h4>
        <div class="form-group">
            <label>Nivel Educativo</label>
            <input type="text" name="nivel_educativo" class="form-control" value="{{ old('nivel_educativo', $user->experienciaLaboral->nivel_educativo ?? '') }}">
        </div>

        <div class="form-group">
            <label>Título del Empleado</label>
            <input type="text" name="titulo_empleado" class="form-control" value="{{ old('titulo_empleado', $user->experienciaLaboral->titulo_empleado ?? '') }}">
        </div>

        <div class="form-group">
            <label>Empresa Actual</label>
            <input type="text" name="empresa_actual" class="form-control" value="{{ old('empresa_actual', $user->experienciaLaboral->empresa_actual ?? '') }}">
        </div>

        <div class="form-group">
            <label>Cargo Actual</label>
            <input type="text" name="cargo_actual" class="form-control" value="{{ old('cargo_actual', $user->experienciaLaboral->cargo_actual ?? '') }}">
        </div>

        <div class="form-group">
            <label>Descripción de Responsabilidades</label>
            <textarea name="descripcion_responsabilidades" class="form-control">{{ old('descripcion_responsabilidades', $user->experienciaLaboral->descripcion_responsabilidades ?? '') }}</textarea>
        </div>

        <hr>
        <h4>Habilidades</h4>
        <div class="form-group">
            <label>Habilidades Técnicas</label>
            <input type="text" name="habilidades_tecnicas" class="form-control" value="{{ old('habilidades_tecnicas', $user->habilidades->habilidades_tecnicas ?? '') }}">
        </div>

        <div class="form-group">
            <label>Habilidades Blandas</label>
            <input type="text" name="habilidades_blandas" class="form-control" value="{{ old('habilidades_blandas', $user->habilidades->habilidades_blandas ?? '') }}">
        </div>

        <div class="form-group">
            <label>Idiomas</label>
            <input type="text" name="idiomas" class="form-control" value="{{ old('idiomas', $user->habilidades->idiomas ?? '') }}">
        </div>

        <hr>
        <h4>Documentos</h4>
        <div class="form-group">
            <label>Foto de Perfil</label>
            <input type="file" name="perfil" class="form-control">
        </div>

        <div class="form-group">
            <label>Título Profesional</label>
            <input type="file" name="titulo" class="form-control">
        </div>

        <div class="form-group">
            <label>Certificados</label>
            <input type="file" name="certificados[]" class="form-control" multiple>
        </div>

        <div class="form-group">
            <label>Certificados Externos</label>
            <input type="file" name="certificados_externos[]" class="form-control" multiple>
        </div>

        <button type="submit" class="btn btn-primary mt-3">Guardar Cambios</button>
    </form>
</div>
@endsection
