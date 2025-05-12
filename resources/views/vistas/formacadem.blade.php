@extends('layouts.app')
@section('content')

    <div class="container d-flex justify-content-center mt-5">
        <div class="card w-100 shadow-lg p-4">
            <div class="card-body">
                <h5 class="card-title">Formación Academica</h5>
                <form method="POST" action="{{ route('formacadem.store') }}">
                    @csrf

                    <div class="form-container">
                        <div class="form-group">
                            <label for="nivel-educativo">Nivel Educativo Actual</label>
                            <input type="text" id="nivel-educativo" name="nivel_educativo" class="form-control"
                                value="Universidad" readonly>
                        </div>


                        <div class="form-group">
                            <label for="institucion">Institución Educativa</label>
                            <input type="text" id="institucion" name="institucion" class="form-control"
                                value="Universidad Estatal De Sonora">
                        </div>

                        <div class="form-group">
                            <label for="carrera">Carrera Universitaria</label>
                            <select id="carrera" name="carrera" class="form-control" required>
                                <option value="">Seleccione una carrera</option>

                                <!-- Ingenierías -->
                                <option value="Ingeniería Ambiental">Ingeniería Ambiental</option>
                                <option value="Ingeniería Biomédica">Ingeniería Biomédica</option>
                                <option value="Ingeniería en Biotecnología Acuática">Ingeniería en Biotecnología Acuática
                                </option>
                                <option value="Ingeniería en Geociencias">Ingeniería en Geociencias</option>
                                <option value="Ingeniería en Horticultura">Ingeniería en Horticultura</option>
                                <option value="Ingeniería Industrial en Manufactura">Ingeniería Industrial en Manufactura
                                </option>
                                <option value="Ingeniería Mecatrónica">Ingeniería Mecatrónica</option>
                                <option value="Ingeniería en Software">Ingeniería en Software</option>
                                <option value="Ingeniería en Tecnología de Alimentos">Ingeniería en Tecnología de Alimentos
                                </option>

                                <!-- Licenciaturas -->
                                <option value="Administración de Empresas">Administración de Empresas</option>
                                <option value="Administración de Empresas Turísticas">Administración de Empresas Turísticas
                                </option>
                                <option value="Agronegocios">Agronegocios</option>
                                <option value="Comercio Internacional">Comercio Internacional</option>
                                <option value="Contaduría">Contaduría</option>
                                <option value="Criminología">Criminología</option>
                                <option value="Ecología">Ecología</option>
                                <option value="Enfermería">Enfermería</option>
                                <option value="Enseñanza del Inglés">Enseñanza del Inglés</option>
                                <option value="Entrenamiento Deportivo">Entrenamiento Deportivo</option>
                                <option value="Finanzas e Inversiones">Finanzas e Inversiones</option>
                                <option value="Fisioterapia">Fisioterapia</option>
                                <option value="Gestión y Desarrollo de Negocios">Gestión y Desarrollo de Negocios</option>
                                <option value="Medicina General y Comunitaria">Medicina General y Comunitaria</option>
                                <option value="Nutrición Humana">Nutrición Humana</option>
                            </select>
                        </div>


                        <div class="form-group">
                            <label for="titulo">Título Obtenido</label>
                            <div class="radio-group">
                                <label><input type="radio" name="titulo" value="obtenido"> Obtenido</label>
                                <label><input type="radio" name="titulo" value="en-curso"> En Curso</label>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="certificaciones">Certificaciones Académicas</label>
                            <input type="text" id="certificaciones" name="certificaciones" class="form-control">
                        </div>

                        <button type="submit" class="btn btn-primary">Siguiente</button>
                    </div>
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
        </div>
    </div>
@endsection