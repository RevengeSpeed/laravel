<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield("title")</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.0.3/dist/tailwind.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/styleshome.css') }}">
</head>

<body class="antialiased bg-gray-100 dark:bg-gray-900">
    <header>
        <div class="max-w-7xl mx-auto flex justify-between items-center">

            <!-- Nombre de la aplicación o logo -->
            <a href="/"  class="inline-flex items-center text-white text-lg font-semibold space-x-2">
                <img src="{{ asset('assets/images/logo.png') }}" alt="Logo" class="w-12 h-auto">
                <span>Oportunidad de Trabajo</span>
            </a>



            <div class="flex space-x-4">
                <!-- Mostrar el enlace de login si el usuario no está autenticado -->
                @guest
                @if (Route::has('login'))
                <a href="{{ route('login') }}" class="text-white hover:text-gray-400">Log in</a>
                @endif

                @if (Route::has('register'))
                <a href="{{ route('register') }}" class="text-white hover:text-gray-400">Register</a>
                @endif
                @else
                <!-- Mostrar el nombre del usuario y el enlace de logout si está autenticado -->
                <a href="{{ route('logout') }}"
                    class="text-white hover:text-gray-400 flex items-center"
                    onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                    <img src="{{ asset('assets/images/logout.png') }}" alt="Logout" class="mr-2" style="width: 40px; height: 40px;">
                    Logout ({{ Auth::user()->name }})
                </a>

                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                    @csrf
                </form>
                @endguest
            </div>
        </div>
    </header>
</body>

</html>