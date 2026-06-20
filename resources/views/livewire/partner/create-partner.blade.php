<form wire:submit="save" class="max-w-5xl mx-auto p-6 md:p-8 space-y-10 bg-white dark:bg-zinc-900 border border-zinc-200 dark:border-zinc-700 rounded-xl shadow-sm">

    {{-- Grid de secciones --}}
    <div class="grid md:grid-cols-2 gap-10">

        {{-- Datos Personales --}}
        <div class="space-y-6">
            <div>
                <flux:heading size="lg">Datos personales</flux:heading>
                <flux:subheading>Información obligatoria del socio</flux:subheading>
            </div>

            <div class="space-y-4">
                <flux:input wire:model="name" label="Nombre" placeholder="Nombre" />
                <flux:input wire:model="last_name" label="Apellido" placeholder="Apellido" />
                <flux:input wire:model="dni" label="DNI" type="number" placeholder="DNI" />

                <flux:select wire:model="sexo" label="Sexo" placeholder="Seleccione un sexo">
                    <flux:select.option value="masculino">Masculino</flux:select.option>
                    <flux:select.option value="femenino">Femenino</flux:select.option>
                </flux:select>

                <flux:input wire:model="date_of_registration" label="Fecha de registro" type="date" />
                <flux:input wire:model="date_of_birth" label="Fecha de nacimiento" type="date" />
            </div>
        </div>

        {{-- Datos de Contacto --}}
        <div class="space-y-6">
            <div>
                <flux:heading size="lg">Datos de contacto</flux:heading>
                <flux:subheading>Información opcional para comunicación</flux:subheading>
            </div>

            <div class="space-y-4">
                <flux:input wire:model="email" label="Email" type="email" placeholder="correo@ejemplo.com" />
                <flux:input wire:model="address" label="Dirección" placeholder="Calle y número" />
                <flux:input wire:model="phone" label="Teléfono" placeholder="+54 345..." />
            </div>
        </div>
    </div>

    {{-- Tabla de Debitos --}}
    <div class="space-y-4 border-t border-zinc-200 dark:border-zinc-700 pt-8">
        <flux:heading size="lg">Débitos asignados</flux:heading>

        <div class="border border-zinc-200 dark:border-zinc-700 rounded-lg overflow-hidden">
            <table class="w-full text-left">
                <thead class="bg-zinc-50 dark:bg-zinc-800 text-xs uppercase text-zinc-500">
                    <tr>
                        <th class="px-6 py-3">ID</th>
                        <th class="px-6 py-3">Nombre</th>
                        <th class="px-6 py-3">Monto</th>
                        <th class="px-6 py-3 text-center">Asignar</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-zinc-200 dark:divide-zinc-700">
                    @foreach ($allDebits as $debit)
                        <tr class="hover:bg-zinc-50 dark:hover:bg-zinc-800 transition-colors">
                            <td class="px-6 py-4 text-zinc-500">{{ $debit->id }}</td>
                            <td class="px-6 py-4 font-medium">{{ $debit->name }}</td>
                            <td class="px-6 py-4 font-mono">${{ number_format($debit->amount, 2) }}</td>
                            <td class="px-6 py-4 text-center">
                                <flux:checkbox wire:model="debitsToAssign.{{ $debit->id }}" />
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    {{-- Footer Actions --}}
    <div class="flex items-center gap-4 pt-4">
        <flux:button variant="primary" type="submit">Guardar cambios</flux:button>
        <flux:button variant="filled" type="button" onclick="history.back()">Cancelar</flux:button>
    </div>
</form>
