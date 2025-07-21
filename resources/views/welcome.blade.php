<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        @include('partials.head')
    </head>
    <body class="bg-[#FDFDFC] dark:bg-[#0a0a0a] text-[#1b1b18] flex p-6 lg:p-8 items-center lg:justify-center min-h-screen flex-col">
        <x-header />
        <div class="flex items-center justify-center w-full transition-opacity opacity-100 duration-750 lg:grow starting:opacity-0">
            <main class="flex max-w-[335px] w-full flex-col-reverse lg:max-w-4xl lg:flex-row">
                <img src="{{ asset('logo.jpg') }}" alt="CEC Socios">
                <div class="flex flex-col items-center justify-center gap-6 p-6 md:p-10 lg:w-1/2">
                    <div class="flex flex-col gap-2">
                        <h1 class="text-3xl font-bold text-black dark:text-white">Bienvenido/a al sistema de socios de Estudiantes</h1>
                    </div>
                </div>
            </main>
        </div>
        @fluxScripts
    </body>
</html>
