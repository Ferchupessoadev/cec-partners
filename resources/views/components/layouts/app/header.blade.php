<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="dark">
    <head>
        @include('partials.head')
        @livewireStyles
    </head>
    <body class="min-h-screen bg-white dark:bg-zinc-800">
        <flux:header container class="border-b border-zinc-200 bg-green-700 dark:border-zinc-700 dark:bg-green-800">
            <flux:sidebar.toggle class="lg:hidden" icon="bars-2" inset="left" />

            <a href="{{ route('dashboard') }}" class="ms-2 me-5 flex items-center space-x-2 rtl:space-x-reverse lg:ms-0 text-white" wire:navigate>
                <x-app-logo />
            </a>

            <flux:navbar class="-mb-px max-lg:hidden">
                <flux:navbar.item icon="home" :href="route('dashboard')" :current="request()->routeIs('dashboard')" wire:navigate>
                    {{ __('Inicio') }}
                </flux:navbar.item>
                @role('admin')
                    <flux:navbar.item icon="users" :href="route('partners.index')" :current="request()->routeIs('partners.index')" wire:navigate>
                        {{ __('Socios') }}
                    </flux:navbar.item>
                    <flux:navbar.item icon="credit-card" :href="route('debits.index')" :current="request()->routeIs('debits.index')" wire:navigate>
                        {{ __('Lista de debitos') }}
                    </flux:navbar.item>
                    <flux:navbar.item icon="credit-card" :href="route('debitsProcess.index')" :current="request()->routeIs('debitsProcess.index')" wire:navigate>
                        {{ __('Procesar debitos') }}
                    </flux:navbar.item>
                @endrole
            </flux:navbar>

            <flux:spacer />
            <flux:dropdown x-data align="end">
                <flux:button variant="subtle" square class="group" aria-label="Preferred color scheme">
                    <flux:icon.sun x-show="$flux.appearance === 'light'" variant="mini" class="text-white dark:text-white" />
                    <flux:icon.moon x-show="$flux.appearance === 'dark'" variant="mini" class="text-white dark:text-white" />
                    <flux:icon.moon x-show="$flux.appearance === 'system' && $flux.dark" variant="mini" />
                    <flux:icon.sun x-show="$flux.appearance === 'system' && ! $flux.dark" variant="mini" />
                </flux:button>

                <flux:menu>
                    <flux:menu.item icon="sun" x-on:click="$flux.appearance = 'light'">Claro</flux:menu.item>
                    <flux:menu.item icon="moon" x-on:click="$flux.appearance = 'dark'">Oscuro</flux:menu.item>
                    <flux:menu.item icon="computer-desktop" x-on:click="$flux.appearance = 'system'">Sistema</flux:menu.item>
                </flux:menu>
            </flux:dropdown>

            <!-- Desktop User Menu -->
            <flux:dropdown position="top" align="end">
                <flux:profile
                    class="cursor-pointer"
                    circle
                />

                <flux:menu>
                    <flux:menu.radio.group>
                        <div class="p-0 text-sm font-normal">
                            <div class="flex items-center gap-2 px-1 py-1.5 text-start text-sm">
                                <span class="relative flex h-8 w-8 shrink-0 overflow-hidden rounded-lg">
                                    <span
                                        class="flex h-full w-full items-center justify-center rounded-lg bg-neutral-200 text-black dark:bg-neutral-700 dark:text-white"
                                    >
                                        <x-avatar :initials="auth()->user()->initials()"/>
                                    </span>
                                </span>
                                <div class="grid flex-1 text-start text-sm leading-tight">
                                    <span class="truncate font-semibold">{{ auth()->user()->name }}</span>
                                    <span class="truncate text-xs">{{ auth()->user()->email }}</span>
                                </div>
                            </div>
                        </div>
                    </flux:menu.radio.group>

                    <flux:menu.separator />

                    <flux:menu.item :href="route('profile.index')"  icon="user" wire:navigate>
                        {{ __('Perfil') }}
                    </flux:menu.item>

                    <form method="POST" action="{{ route('logout') }}" class="w-full">
                        @csrf
                        <flux:menu.item as="button" type="submit" icon="arrow-right-start-on-rectangle" class="w-full">
                            {{ __('Cerrar Sesión') }}
                        </flux:menu.item>
                    </form>
                </flux:menu>
            </flux:dropdown>
        </flux:header>

        <!-- Mobile Menu -->
        <flux:sidebar stashable sticky class="lg:hidden border-e border-zinc-200 bg-zinc-50 dark:border-zinc-700 dark:bg-zinc-900">
            <flux:sidebar.toggle class="lg:hidden" icon="x-mark" />

            <a href="{{ route('dashboard') }}" class="ms-1 flex items-center space-x-2 rtl:space-x-reverse" wire:navigate>
                <x-app-logo />
            </a>

            <flux:navlist variant="outline">
                <flux:navlist.group>
                    <flux:navlist.item icon="home" :href="route('dashboard')" :current="request()->routeIs('dashboard')" wire:navigate>
                      {{ __('Inicio') }}
                    </flux:navlist.item>
                    @role('admin')
                        <flux:navlist.item icon="users" :href="route('partners.index')" :current="request()->routeIs('partners.index')" wire:navigate>
                            {{ __('Socios') }}
                        </flux:navlist.item>
                        <flux:navlist.item icon="credit-card" :href="route('debits.index')" :current="request()->routeIs('debits.index')" wire:navigate>
                            {{ __('Lista de debitos') }}
                        </flux:navlist.item>
                        <flux:navlist.item icon="credit-card" :href="route('debitsProcess.index')" :current="request()->routeIs('debitsProcess.index')" wire:navigate>
                            {{ __('Procesar de debitos') }}
                        </flux:navlist.item>
                    @endrole
                </flux:navlist.group>
            </flux:navlist>

        </flux:sidebar>

        {{ $slot }}

        @fluxScripts
        @livewireScripts
    </body>
</html>
