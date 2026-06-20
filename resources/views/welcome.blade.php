<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    @include('partials.head')
</head>
<body class="bg-gray-50 dark:bg-[#0a0a0a] text-gray-900 dark:text-gray-100 min-h-screen flex flex-col font-sans antialiased">

    <header class="w-full p-6 flex justify-between items-center max-w-6xl mx-auto">
        <div class="text-xl font-bold tracking-tight">CEC Socios</div>
        <nav class="flex items-center gap-4">
            <flux:switch x-data x-model="$flux.dark" label="Modo oscuro" />
            @if (Route::has('login'))
                @auth
                    <a href="{{ url('/dashboard') }}" class="text-sm font-medium hover:text-blue-600 transition">Panel</a>
                @else
                    <a href="{{ route('login') }}" class="text-sm font-medium hover:text-blue-600 transition">Ingresar</a>
                    @if (Route::has('register'))
                        <a href="{{ route('register') }}" class="px-4 py-2 bg-blue-600 text-white rounded-full text-sm font-semibold hover:bg-blue-700 transition shadow-lg">Registrarse</a>
                    @endif
                @endauth
            @endif
        </nav>
    </header>

    <main class="flex-grow flex items-center justify-center p-6">
        <div class="bg-white dark:bg-[#161616] p-8 md:p-12 rounded-3xl shadow-xl border border-gray-100 dark:border-gray-800 max-w-2xl w-full text-center flex flex-col items-center gap-6">

            <div class="w-32 h-32 overflow-hidden rounded-2xl shadow-md">
                <img src="{{ asset('logo.jpg') }}" alt="CEC Socios" class="w-full h-full object-cover">
            </div>

            <div class="space-y-4">
                <h1 class="text-4xl md:text-5xl font-extrabold tracking-tighter">Bienvenido al sistema <br><span class="text-blue-600">de Estudiantes</span></h1>
                <p class="text-gray-500 dark:text-gray-400 text-lg">Gestiona tu membresía, beneficios y actividades desde un solo lugar.</p>
            </div>

            <div class="flex gap-4 pt-4">
                <a href="{{ route('login') }}" class="px-8 py-3 bg-gray-900 dark:bg-white text-white dark:text-black rounded-full font-semibold hover:scale-105 transition-transform shadow-md">
                    Acceder al sistema
                </a>
            </div>
        </div>
    </main>

    @fluxScripts
</body>
</html>
