@extends('layouts.app')
@section('content')

    <div class="container d-flex justify-content-center mt-5">
        <div class="card w-100 shadow-lg p-4">
            <div class="card-body">
                <h5 class="card-title">Documentación</h5>
                <form method="POST" action="{{ route('documentos.store') }}" enctype="multipart/form-data">
                    @csrf

                    <div class="form-group mt-3">
                        <label for="perfil">Foto de perfil</label>
                        <input
                            type="file"
                            name="perfil"
                            id="perfil"
                            class="form-control @error('perfil') is-invalid @enderror"
                            accept="image/*"
                            required
                        >
                        @error('perfil')
                            <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                        @enderror
                    </div>

                    <div class="form-group mt-3">
                        <label for="titulo">Título universitario</label>
                        <input
                            type="file"
                            name="titulo"
                            id="titulo"
                            class="form-control @error('titulo') is-invalid @enderror"
                            accept=".pdf,.jpg,.png"
                            required
                        >
                        @error('titulo')
                            <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                        @enderror
                    </div>

                    <div class="form-group mt-3">
                        <label for="certificados">Certificados</label>
                        <input
                            type="file"
                            name="certificados[]"
                            id="certificados"
                            class="form-control @error('certificados.*') is-invalid @enderror"
                            accept=".pdf,.jpg,.png"
                            multiple
                            required
                        >
                        @error('certificados.*')
                            <span class="invalid-feedback d-block" role="alert"><strong>{{ $message }}</strong></span>
                        @enderror
                    </div>

                    <div class="form-group mt-3">
                        <label for="certificados_externos">Certificados externos</label>
                        <input
                            type="file"
                            name="certificados_externos[]"
                            id="certificados_externos"
                            class="form-control @error('certificados_externos.*') is-invalid @enderror"
                            accept=".pdf,.jpg,.png"
                            multiple
                            required
                        >
                        @error('certificados_externos.*')
                            <span class="invalid-feedback d-block" role="alert"><strong>{{ $message }}</strong></span>
                        @enderror
                    </div>

                    <div class="d-flex justify-content-between mt-4">
                        <a href="{{ route('documentos.index') }}" class="btn btn-secondary">
                            Volver
                        </a>
                        <button type="submit" class="btn btn-primary">
                            Subir Documentos
                        </button>
                    </div>
                </form>

                @if (session('success'))
                    <div class="alert alert-success mt-3" role="alert">
                        {{ session('success') }}
                    </div>
                @endif
                @if (session('error'))
                    <div class="alert alert-danger mt-3" role="alert">
                        {{ session('error') }}
                    </div>
                @endif

            </div>
        </div>
    </div>
@endsection
