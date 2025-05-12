@extends('layouts.app')
@section('content')

    <div class="container d-flex justify-content center mt-5">
        <div class="card w-100 shadow-lg p-4">
            <div class="card-body">
                <h5 class="card-title">Habilidades</h5>
                <form method="POST" action="{{ route('habilidades.store') }}">

                    @csrf
                    <div class="form-group">
                        <label for="nombre">Habilidades tecnicas</label>
                        <input type="text" name="habilidades_tecnicas" id="habilidades_tecnicas" class="form-control"
                            required>
                    </div>
                    <div class="form-group">
                        <label for="Apellido">Habilidades Blandas</label>
                        <input type="text" name="habilidades_blandas" id="habilidades_blandas" class="form-control"
                            required>
                    </div>
                    <div class="form-group">
                        <label for="idiomas">Idiomas</label>
                        <select name="idiomas" id="idiomas" class="form-control" required>
                            <option value="">Seleccione un idioma</option>
                            <option value="Inglés">Inglés</option>
                            <option value="Francés">Francés</option>
                            <option value="Alemán">Alemán</option>
                            <option value="Italiano">Italiano</option>
                            <option value="Portugués">Portugués</option>
                            <option value="Chino Mandarín">Chino Mandarín</option>
                            <option value="Japonés">Japonés</option>
                            <option value="Coreano">Coreano</option>
                            <option value="Ruso">Ruso</option>
                            <option value="Árabe">Árabe</option>
                            <option value="Hindi">Hindi</option>
                            <option value="Turco">Turco</option>
                            <option value="Sueco">Sueco</option>
                            <option value="Holandés">Holandés</option>
                            <option value="Noruego">Noruego</option>
                            <option value="Griego">Griego</option>
                            <option value="Polaco">Polaco</option>
                            <option value="NINGUNO"></option>
                        </select>
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
        </div>
    </div>
@endsection