<div class="p-6 md:p-10 max-w-4xl mx-auto space-y-6">
    {{-- Header --}}
    <div class="flex items-center justify-between">
        <div>
            <h1 class="text-2xl font-bold text-zinc-900 dark:text-zinc-100">Gestión de Débitos</h1>
            <p class="text-sm text-zinc-500 dark:text-zinc-400">Administra los conceptos y montos de los débitos.</p>
        </div>
        <flux:modal.trigger name="create-debit">
            <flux:button variant="primary" icon="plus">Crear débito</flux:button>
        </flux:modal.trigger>
    </div>

    {{-- Contenedor de la tabla (sustituto de card) --}}
    <div class="bg-white dark:bg-zinc-900 border border-zinc-200 dark:border-zinc-700 rounded-xl shadow-sm overflow-hidden">
        <table class="w-full text-left border-collapse">
            <thead class="bg-zinc-50 dark:bg-zinc-800/50 border-b border-zinc-200 dark:border-zinc-700">
                <tr>
                    <th class="px-6 py-4 text-xs font-semibold text-zinc-500 uppercase tracking-wider">Nombre</th>
                    <th class="px-6 py-4 text-xs font-semibold text-zinc-500 uppercase tracking-wider">Monto</th>
                    <th class="px-6 py-4 text-xs font-semibold text-zinc-500 uppercase tracking-wider text-right">Acciones</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-zinc-200 dark:divide-zinc-700">
                @foreach ($debits as $debit)
                    <tr class="hover:bg-zinc-50 dark:hover:bg-zinc-800/50 transition-colors">
                        <td class="px-6 py-4 font-medium text-zinc-900 dark:text-zinc-100">{{ $debit->name }}</td>
                        <td class="px-6 py-4 font-mono text-zinc-600 dark:text-zinc-300">${{ number_format($debit->amount, 2) }}</td>
                        <td class="px-6 py-4 text-right">
                            <div class="flex justify-end gap-2">
                                <flux:modal.trigger name="edit-debit-{{ $debit->id }}">
                                    <flux:button
                                        variant="ghost"
                                        icon="pencil"
                                        size="sm"
                                        wire:click="loadDebitToEdit({{ $debit->id }})"
                                    />
                                </flux:modal.trigger>

                                <flux:button
                                    variant="danger"
                                    icon="trash"
                                    size="sm"
                                    wire:click="deleteDebit({{ $debit->id }})"
                                />
                            </div>
                        </td>
                    </tr>
                    <flux:modal name="edit-debit-{{ $debit->id }}" class="w-full max-w-md">
                        <div class="space-y-6">
                            <flux:heading size="lg">Editar Débito</flux:heading>
                            <form class="space-y-4" wire:submit="editDebit({{ $debit->id }})">
                                <flux:input label="Nombre" wire:model="nameToEdit" />
                                <flux:input label="Monto" wire:model="amountToEdit" prefix="$" type="number" />
                                <flux:button type="submit" variant="primary" class="w-full">Actualizar</flux:button>
                            </form>
                        </div>
                    </flux:modal>
                @endforeach
            </tbody>
        </table>
    </div>

    {{-- Modales (permanecen igual) --}}
    <flux:modal name="create-debit" class="w-full max-w-md">
        <div class="space-y-6">
            <flux:heading size="lg">Nuevo Débito</flux:heading>
            <form class="space-y-4" wire:submit="createDebit">
                <flux:input label="Nombre" wire:model="name" placeholder="Ej. Cuota Social" />
                <flux:input label="Monto" wire:model="amount" prefix="$" type="number" />
                <flux:button type="submit" variant="primary" class="w-full">Guardar</flux:button>
            </form>
        </div>
    </flux:modal>
</div>
