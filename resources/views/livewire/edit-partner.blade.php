<form wire:submit="save" class="flex flex-col gap-6 rounded-md p-4">
    <div class="space-y-6 flex w-full gap-5 px-10">
        <div class="flex flex-col gap-5 w-1/2">
            <flux:heading size="xl">Datos personales</flux:heading>
            <span class="text-zinc-400">{{ __('Los datos personales son obligatorios') }}</span>
            <div class="flex flex-col gap-4">
                <flux:input wire:model="name" placeholder="Nombre" type="text" value="{{ old('name') }}" />
                <flux:input wire:model="last_name" placeholder="Apellido" type="text" value="{{ old('last_name') }}" />
                <flux:select wire:model="sexo" size="sm" placeholder="Sexo">
                    <flux:select.option>masculino</flux:select.option>
                    <flux:select.option>femenino</flux:select.option>
                </flux:select>
                @error('sexo') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                <flux:input wire:model="dni" type="number" placeholder="DNI" value="{{ old('dni') }}" />
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
        </div>
    </div>
    <div class="flex items-center gap-4 pl-10">
        <flux:button variant="primary" class="cursor-pointer" type="submit">Guardar</flux:button>
        <flux:button variant="filled" class="cursor-pointer" @click="history.back()">Cancelar</flux:button>
    </div>
</form>
