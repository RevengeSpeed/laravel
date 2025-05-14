@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Siga las instrucciones') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <!-- Texto en el centro -->
                    <div class="text-center">
                        <h3>{{ __('Bienvenido') }}</h3>
                        <h5>{{ __('Presione el siguiente botón para continuar hacia su CV') }}</h5>

                        <!-- Enlace con el botón, ahora solo un enlace con estilo de botón -->
                        <a href="{{ route('vistas.crear') }}" class="btn btn-primary" role="button">
                            {{ __('Continuar') }}
                        </a>

                        <a href="{{ route('vistas.createpracticas') }}" class="btn-primary" role="button">
                            {{ __('Crear Practicas') }}
                        </a>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
