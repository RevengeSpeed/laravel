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
                    <label for="Nacionalidad">Idiomas</label>
                    <input type="text" name="idiomas" id="idiomas" class="form-control" required>
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