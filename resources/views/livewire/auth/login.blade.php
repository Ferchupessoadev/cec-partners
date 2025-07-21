<div class="flex flex-col gap-6">
    <flux:heading level="1" size="xl" class="text-center text-2xl">
        {{ __('Inciar sesión') }}
    </flux:heading>

    <!-- Session Status -->
    <x-auth-session-status class="text-center" :status="session('status')" />

    <form wire:submit="login" class="flex flex-col gap-6">
        <!-- Email Address -->
        <div class="relative">
            <flux:input
                wire:model="email"
                type="email"
                autofocus
                autocomplete="email"
                placeholder="Dirección de correo"
            />

            @error('email')
                <p class="text-xs text-red-600 dark:text-red-400">{{ $message }}</p>
            @enderror
        </div>

        <!-- Password -->
        <div class="relative">
            <flux:input
                wire:model="password"
                type="password"
                autocomplete="current-password"
                :placeholder="__('Contraseña')"
                viewable
            />

            @error('password')
                <p class="text-xs text-red-600 dark:text-red-400">{{ $message }}</p>
            @enderror
        </div>

        <!-- Remember Me -->
        <flux:checkbox wire:model="remember" :label="__('Recuerdame')" />

        <div class="flex items-center justify-end">
            <flux:button variant="primary" type="submit" class="w-full text-white bg-green-800 hover:bg-green-900 cursor-pointer">{{ __('Inciar sesión') }}</flux:button>
        </div>
    </form>

    @if (Route::has('register'))
        <div class="space-x-1 rtl:space-x-reverse text-center text-sm text-zinc-600 dark:text-zinc-400">
            <span>{{ __('No tienes una cuenta?') }}</span>
            <flux:link :href="route('register')" wire:navigate>{{ __('Registrate') }}</flux:link>
        </div>
    @endif
</div>
