<header>
    <div class="max-w-7xl mx-auto flex justify-between items-center py-4">

        <!-- Logo y nombre de la aplicación -->
        <a href="/" class="inline-flex items-center text-white text-lg font-semibold space-x-2">
            <img src="{{ asset('assets/images/logo.png') }}" alt="Logo" style="width: 40px; height: auto;">
            <span>Oportunidad de Trabajo</span>
        </a>

        <div class="flex items-center space-x-4">
            @guest
                @if (Route::has('login'))
                    <a href="{{ route('login') }}" class="text-white hover:text-gray-400">Log in</a>
                @endif
                @if (Route::has('register'))
                    <a href="{{ route('register') }}" class="text-white hover:text-gray-400">Register</a>
                @endif
            @else
                <a href="{{ route('perfil.show') }}" class="text-white hover:text-gray-400 flex items-center">
                    {{ Auth::user()->name }}
                </a>

                <a href="{{ route('perfil.editar') }}" class="text-white hover:text-gray-400 px-3 py-1 border border-white rounded hover:bg-white hover:text-gray-900 transition">
                    Editar Perfil
                </a>

                <!-- Botón de logout -->
                <a href="{{ route('logout') }}" class="text-white hover:text-red-400 flex items-center"
                    onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                    <img src="{{ asset('assets/images/logout.png') }}" alt="Logout" class="mr-2"
                        style="width: 40px; height: 40px;">
                    Logout
                </a>

                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="hidden">
                    @csrf
                </form>
            @endguest
        </div>
    </div>
</header>
