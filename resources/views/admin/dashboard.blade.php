@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <!-- Texto en el centro -->
                    <div class="text-center">
                        <h3>{{ __('Bienvenido!') }}</h3>
                        <a href="{{ route('vistas.MostrarCVS') }}">
                            <button type="button" class="btn btn-primary">Mirar CVS</button>
                        </a>
                    </div>



                </div>
            </div>
        </div>
    </div>
</div>
@endsection