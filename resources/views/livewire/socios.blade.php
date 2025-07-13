<div class="flex flex-col m-0 p-0 gap-2">
    <flux:heading size="xl" level="1">Listado de socios</flux:heading>

    <x-socios-table :socios="$socios" />

    {{ $socios->links(data: ['scrollTo' => false])}}

</div>
