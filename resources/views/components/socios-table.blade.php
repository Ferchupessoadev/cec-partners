@props(['socios'])

<div class="rounded-md border-gray-700 border overflow-x-auto bg-zinc-900">
    @if ($socios->count() > 0)
        <table class="w-full text-md text-left text-zinc-100">
            <thead class="border-b border-gray-700 bg-zinc-800">
                <tr>
                    <th class="px-4 py-3 text-xs font-semibold uppercase tracking-wider">N° Socio</th>
                    <th class="px-4 py-3 text-xs font-semibold uppercase tracking-wider">Nombre completo</th>
                    <th class="px-4 py-3 text-xs font-semibold uppercase tracking-wider">DNI</th>
                    <th class="px-4 py-3 text-xs font-semibold uppercase tracking-wider">Inscripción</th>
                    <th class="px-4 py-3 text-xs font-semibold uppercase tracking-wider">Nacimiento</th>
                    <th class="px-4 py-3 text-xs font-semibold uppercase tracking-wider text-right">Acciones</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-700">
                @foreach ($socios as $socio)
                    <tr wire:key="socio-{{ $socio->id }}" class="hover:bg-gray-800/50 transition-colors">
                        <td class="px-4 py-3 text-zinc-400">{{ $socio->id }}</td>
                        <td class="px-4 py-3 font-medium">{{ $socio->name . ', ' . $socio->last_name }}</td>
                        <td class="px-4 py-3">{{ $socio->dni }}</td>
                        <td class="px-4 py-3">{{ $socio->date_of_registration->format('d/m/Y') }}</td>
                        <td class="px-4 py-3">{{ $socio->date_of_birth->format('d/m/Y') }}</td>
                        <td class="px-4 py-3 text-right">
                            <flux:dropdown position="bottom" align="end">
                                <flux:button variant="subtle" square icon="ellipsis-vertical"></flux:button>
                                <flux:menu>
                                    <flux:menu.item icon="pencil" wire:navigate href="{{ route('partners.edit', $socio->id) }}">Editar</flux:menu.item>
                                    <flux:menu.item
                                        icon="trash"
                                        x-on:click="$wire.showModalToDelete = true; $wire.partnerToDelete = {{ $socio->id }}"
                                        class="cursor-pointer text-red-400"
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
        <p class="p-6 text-center text-zinc-400">No se encontraron socios</p>
    @endif
</div>
