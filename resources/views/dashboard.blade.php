<x-layouts.app title="Dashboard">
    <flux:heading class="text-start font-bold" size="xl">Hola {{ auth()->user()->name }}</flux:heading>

    <div class="dark:border-zinc-200 mt-4">
        <div>
            <p>Información de las cuotas</p>
        </div>
        <div>
            Precio: $15000
        </div>
    </div>
</x-layouts.app>
