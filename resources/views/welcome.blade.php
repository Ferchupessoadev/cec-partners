<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>{{ config('app.name') }}</title>

        <link rel="icon" href="/logo.png" sizes="any">

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600" rel="stylesheet" />
        @vite(['resources/css/app.css', 'resources/js/app.js'])
        @livewireStyles
    </head>
    <body class="bg-[#FDFDFC] dark:bg-[#0a0a0a] text-[#1b1b18] flex p-6 lg:p-8 items-center lg:justify-center min-h-screen flex-col">
        <x-header />
        <div class="flex items-center justify-center w-full transition-opacity opacity-100 duration-750 lg:grow starting:opacity-0">
            <main class="flex max-w-[335px] w-full flex-col-reverse lg:max-w-4xl lg:flex-row">
                <img src="{{ asset('logo.png') }}" alt="CEC Socios" class="w-full lg:w-1/2">
                <div class="flex flex-col items-center justify-center gap-6 p-6 md:p-10 lg:w-1/2">
                    <div class="flex flex-col gap-2">
                        <h1 class="text-3xl font-bold">¡Bienvenido/a al sistema de socios de CEC!</h1>
                    </div>
                </div>
            </main>
        </div>
        @livewireScripts
    </body>
</html>
