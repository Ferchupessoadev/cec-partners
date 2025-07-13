<div class="flex flex-col gap-6">
    <x-auth-header :title="__('Recuperar contraseña')" :description="__('Introduce tu correo para recuperar tu contraseña.')" />

    <x-auth-session-status class="text-center" :status="session('status')" />

    <form wire:submit="sendPasswordResetLink" class="flex flex-col gap-6">
        <flux:input
            wire:model="email"
            :label="__('Direccion de correo')"
            type="email"
            required
            autofocus
            placeholder="email@example.com"
        />

        <flux:button variant="primary" type="submit" class="w-full">{{ __('Recuperar contraseña') }}</flux:button>
    </form>

    <div class="space-x-1 rtl:space-x-reverse text-center text-sm text-zinc-400">
        <span>{{ __('o, vuelve a') }}</span>
        <flux:link :href="route('login')" wire:navigate>{{ __('Inciar sesión') }}</flux:link>
    </div>
</div>
