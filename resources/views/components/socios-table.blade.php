@props(['socios'])

<table class="w-full text-md">
    <thead class="bg-green-800">
        <tr class="text-center">
            <th class="border dark:border-white border-black"><span>N° socio</th>
            <th class="border dark:border-white border-black">Nombre</th>
            <th class="border dark:border-white border-black">Apellido</th>
            <th class="border dark:border-white border-black">Email</th>
            <th class="border dark:border-white border-black">Fecha de nacimiento</th>
            <th class="border dark:border-white border-black">DNI</th>
            <th class="border dark:border-white border-black">Fecha de inscripción</th>
            <th class="border dark:border-white border-black">Acciones</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($socios as $socio)
            <tr class="text-center">
                <td class="border dark:border-white border-black">{{ $socio->id }}</td>
                <td class="border dark:border-white border-black">{{ $socio->name }}</td>
                <td class="border dark:border-white border-black">{{ $socio->last_name }}</td>
                <td class="border dark:border-white border-black">{{ $socio->email }}</td>
                <td class="border dark:border-white border-black">{{ $socio->date_of_birth }}</td>
                <td class="border dark:border-white border-black">{{ $socio->dni }}</td>
                <td class="border dark:border-white border-black">{{ $socio->date_of_registration }}</td>
                <td class="border dark:border-white border-black">
                    <button wire:click="destroy({{ $socio->id }})"><flux:icon name="trash"></flux:icon></button>
                    <button wire:navigate href="{{ route('partners.edit', $socio->id) }}"><flux:icon name="pencil"></flux:icon></button>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
