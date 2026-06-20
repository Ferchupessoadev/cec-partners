<div class="max-w-xl mx-auto p-6">
    <h2 class="text-2xl font-bold mb-6">Configuración de Perfil</h2>

    @if (session()->has('message'))
        <div class="mb-4 p-4 bg-green-100 text-green-700 rounded-lg">
            {{ session('message') }}
        </div>
    @endif

    <form wire:submit="updateProfile" class="space-y-6">
        <flux:input wire:model="name" label="Nombre completo" />

        <div class="border-t pt-6 mt-6">
            <h3 class="text-lg font-semibold mb-4">Cambiar contraseña</h3>

            <flux:input type="password" wire:model="current_password" label="Contraseña actual" />

            <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mt-4">
                <flux:input type="password" wire:model="password" label="Nueva contraseña" />
                <flux:input type="password" wire:model="password_confirmation" label="Confirmar nueva contraseña" />
            </div>
        </div>

        <div class="flex justify-end mt-6">
            <flux:button type="submit" variant="primary">Guardar cambios</flux:button>
        </div>
    </form>
</div>
