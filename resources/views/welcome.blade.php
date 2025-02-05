<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Welcome to job opportunity</title>
        <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.0.3/dist/tailwind.min.css" rel="stylesheet">
    </head>
    <body class="antialiased bg-gray-100 dark:bg-gray-900">
        <!-- Navbar -->
        <nav class="bg-gray-800 p-4">
            <div class="max-w-7xl mx-auto flex justify-between items-center">
                <a href="/" class="text-white text-lg font-semibold">Job Opportunity</a>
                <div class="flex space-x-4">
                    @if (Route::has('login'))
                        @auth
                            <a href="{{ url('/home') }}" class="text-white hover:text-gray-400">Home</a>
                        @else
                            <a href="{{ route('login') }}" class="text-white hover:text-gray-400">Log in</a>
                            @if (Route::has('register'))
                                <a href="{{ route('register') }}" class="text-white hover:text-gray-400">Register</a>
                            @endif
                        @endauth
                    @endif
                </div>
            </div>
        </nav>

        <!-- Content Section -->
        <div class="flex justify-center items-center min-h-screen">
            <div class="max-w-7xl mx-auto p-6 lg:p-8">
                <h2 class="text-2xl font-semibold text-gray-900 dark:text-white">Bienvenido a tu oportunidad de encontrar chamba bastardo</h2>
            </div>
        </div>
    </body>
</html>
