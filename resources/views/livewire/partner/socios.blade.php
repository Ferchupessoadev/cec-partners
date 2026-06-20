<div class="max-w-6xl mx-auto p-6 space-y-6">
    <div class="flex flex-col md:flex-row md:items-center justify-between gap-4">
        <div>
            <h1 class="text-2xl font-bold text-zinc-900 dark:text-zinc-100">Socios</h1>
            <p class="text-sm text-zinc-500 dark:text-zinc-400">Gestión completa del padrón de socios</p>
        </div>

        <flux:button variant="primary" icon="plus" :href="route('partners.create')" wire:navigate>
            Crear socio
        </flux:button>
    </div>

    <div class="bg-zinc-50 dark:bg-zinc-800/50 p-4 rounded-xl border border-zinc-200 dark:border-zinc-700">
        <x-socios-filters />
    </div>

    <x-socios-table :socios="$socios" />

    <x-modal-to-delete-partner />
</div>
