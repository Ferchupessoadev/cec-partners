@props(['socios'])

<div class="rounded-md border-gray-700 border overflow-x-auto">
    @if ($socios->count() > 0)
        <table class="w-full h-full text-md">
            <thead class="border-b border-gray-700">
                <tr class="text-left dark:hover:bg-gray-800">
                    <th class="px-4 py-2"><span>N° socio</th>
                    <th class="px-4 py-2">Nombre completo</th>
                    <th class="px-4 py-2">DNI</th>
                    <th class="px-4 py-2">Fecha de inscripción</th>
                    <th class="px-4 py-2">Fecha de nacimiento</th>
                    <th class="px-4 py-2">Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($socios as $socio)
                    <tr wire:key="socio-{{ $socio->id }}" class="border-b border-gray-700 dark:hover:bg-gray-800">
                        <td class=" px-4 py-2">{{ $socio->id }}</td>
                        <td class=" px-4 py-2">{{ $socio->name . ', ' . $socio->last_name }}</td>
                        <td class=" px-4 py-2">{{ $socio->dni }}</td>
                        <td class=" px-4 py-2">{{ $socio->date_of_registration->format('d/m/Y') }}</td>
                        <td class=" px-4 py-2">{{ $socio->date_of_birth->format('d/m/Y') }}</td>
                        <td class=" px-4 py-2">
                            <flux:dropdown position="bottom" align="end">
                                <flux:button variant="subtle" square icon="ellipsis-vertical"></flux:button>
                                <flux:menu>
                                    <flux:menu.item icon="pencil" wire:navigate href="{{ route('partners.edit', $socio->id) }}">Editar</flux:menu.item>
                                    <flux:menu.item
                                        icon="trash"
                                        x-on:click="$wire.showModalToDelete = true; $wire.partnerToDelete = {{ $socio->id }}"
                                        class="cursor-pointer"
                                    >Eliminar</flux:menu.item>
                                    <flux:menu.item icon="eye" wire:navigate href="{{ route('partners.show', $socio->id) }}">Ver</flux:menu.item>
                                </flux:menu>
                            </flux:dropdown>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @else
        <p class="p-4">No se encontraron socios</p>
    @endif
</div>
