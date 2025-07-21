<form wire:submit="save" class="flex flex-col gap-6 rounded-md p-4">
    <div class="space-y-6 flex w-full gap-5 px-10">
        <div class="flex flex-col gap-5 w-1/2">
            <flux:heading size="xl">Datos personales</flux:heading>
            <span class="text-zinc-400">{{ __('Los datos personales son obligatorios') }}</span>
            <div class="flex flex-col gap-4">
                <flux:input wire:model="name" placeholder="Nombre" type="text" value="{{ old('name') }}" />
                <flux:input wire:model="last_name" placeholder="Apellido" type="text" value="{{ old('last_name') }}" />
                <flux:input wire:model="dni" type="number" placeholder="DNI" value="{{ old('dni') }}" />
                <flux:select wire:model="sexo" size="sm">
                    <flux:select.option disabled selected>Seleccione un sexo</flux:select.option>
                    <flux:select.option>masculino</flux:select.option>
                    <flux:select.option>femenino</flux:select.option>
                </flux:select>
                <flux:input wire:model="date_of_registration" :label="__('Fecha de registro')" type="date" value="{{ old('date_of_registration') }}" />
                <flux:input wire:model="date_of_birth" :label="__('Fecha de nacimiento')" type="date" value="{{ old('date_of_birth') }}" />
            </div>
        </div>
        <div class="flex flex-col gap-5 w-1/2">
            <flux:heading size="xl">Datos de contacto</flux:heading>
            <span class="text-zinc-400">{{ __('Los datos de contacto son opcionales') }}</span>
            <div class="flex flex-col gap-4">
                <flux:input wire:model="email" placeholder="Email" type="email" value="{{ old('email') }}" />
                <flux:input wire:model="address" placeholder="Dirección" type="text" value="{{ old('address') }}" />
                <flux:input wire:model="phone" placeholder="Teléfono" type="text" value="{{ old('phone') }}" />
            </div>
            <!-- Debitos  -->
            <div>
                <flux:heading size="xl">Debitos asignados</flux:heading>
                <div class="flex gap-3">

                </div>
                <div class="flex gap-3 h-full border border-zinc-700">
                    <table class="w-full">
                        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                            <tr class="text-left">
                                <th class="">ID</th>
                                <th class="">Name</th>
                                <th class="">Monto</th>
                                <th class="">Asignar</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                            @foreach ($allDebits as $debit)
                                <tr class="border-b dark:bg-gray-900 dark:border-gray-700">
                                    <td class="">{{ $debit->id }}</td>
                                    <td class="">{{ $debit->name }}</td>
                                    <td class="">${{ $debit->amount }}</td>
                                    <td class="">
                                        <flux:checkbox wire:model="debitsToAssign.{{ $debit->id - 1 }}" value="{{ $debit->id }}" />
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <div class="flex items-center gap-4 pl-14">
        <flux:button variant="primary" class="cursor-pointer" type="submit">Guardar</flux:button>
        <flux:button variant="filled" class="cursor-pointer" @click="history.back()">Cancelar</flux:button>
    </div>
</form>


