<div class="flex flex-col m-0 p-0 gap-2">
    <flux:heading size="xl" level="1">Socios</flux:heading>

    <div class="flex justify-end">
        <flux:button class="w-max px-4" variant="primary" :href="route('partners.create')" wire:navigate>Crear socio</flux:button>
    </div>
    <x-socios-filters />
    <x-socios-table :socios="$socios" />
    <x-modal-to-delete-partner />

    {{ $socios->links(data: ['scrollTo' => false])}}

</div>
