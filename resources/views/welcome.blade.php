@extends('layouts.app')

@section('title', 'Bienvenido')

@section('content')
<div class="container d-flex justify-content-center mt-5">
    <div class="card w-100 shadow-lg p-4">
        <div class="card-body">
            <h5 class="card-title text-center">Bienvenido</h5>
            
            <!-- Verifica si el usuario está autenticado -->
            @guest
                <div class="text-center">
                    <h3>No has iniciado sesión</h3>
                    <p>Para continuar, por favor inicia sesión o regístrate.</p>
                    <div class="d-flex justify-content-center">
                        <a href="{{ route('login') }}">
                            <button type="button" class="btn btn-primary">Iniciar sesión</button>
                        </a>
                        <a href="{{ route('register') }}" class="ml-2">
                            <button type="button" class="btn btn-primary">Registrarse</button>
                        </a>
                    </div>
                </div>
            @else
                <!-- Si el usuario está autenticado, muestra un botón para ir a la página de creación -->
                <div class="text-center">
                    <h3>¡Estás autenticado!</h3>
                    <p>Haz clic en el siguiente botón para continuar con la creación de tu perfil.</p>
                    <a href="{{ route('vistas.crear') }}">
                        <button type="button" class="btn btn-primary">Ir a Crear CV</button>
                    </a>
                </div>
            @endguest

        </div>
    </div>
</div>
@endsection
