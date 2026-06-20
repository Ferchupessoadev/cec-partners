<div class="space-y-6">
    {{-- Barra de Herramientas y Filtros --}}
    <div class="flex flex-col md:flex-row gap-4 justify-between items-end bg-white dark:bg-zinc-900 p-6 rounded-xl border border-zinc-200 dark:border-zinc-700">
        <div class="flex gap-4 w-full md:w-auto">
            <flux:input wire:model.live.debounce.300ms="period" label="Periodo (YYYY-MM)" placeholder="2026-06" class="w-32" />
            <flux:input wire:model.live.debounce.300ms="search" label="Buscar socio" placeholder="Nombre..." />
        </div>

        <div class="flex gap-2">
            <flux:modal.trigger name="generate-invoices">
                <flux:button variant="primary" icon="plus">Generar Periodo</flux:button>
            </flux:modal.trigger>
        </div>
    </div>

    {{-- Table Container --}}
    <div class="bg-white dark:bg-zinc-900 border border-zinc-200 dark:border-zinc-700 shadow-sm rounded-xl overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full text-left border-collapse">
                <thead class="bg-zinc-50 dark:bg-zinc-800/50">
                    <tr class="border-b border-zinc-200 dark:border-zinc-700">
                        <th class="px-6 py-4 text-xs font-semibold text-zinc-500 uppercase">Socio</th>
                        <th class="px-6 py-4 text-xs font-semibold text-zinc-500 uppercase">Concepto</th>
                        <th class="px-6 py-4 text-xs font-semibold text-zinc-500 uppercase text-right">Monto</th>
                        <th class="px-6 py-4 text-xs font-semibold text-zinc-500 uppercase text-center">Estado</th>
                        <th class="px-6 py-4"></th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-zinc-200 dark:divide-zinc-700">
                    @forelse($invoices as $invoice)
                        <tr class="hover:bg-zinc-50 dark:hover:bg-zinc-800 transition-colors">
                            <td class="px-6 py-4">
                                <div class="font-medium text-zinc-900 dark:text-zinc-100">{{ $invoice->partner->name }}</div>
                                <div class="text-xs text-zinc-500">{{ $invoice->partner->email }}</div>
                            </td>
                            <td class="px-6 py-4 text-zinc-600 dark:text-zinc-300">{{ $invoice->debit->name }}</td>
                            <td class="px-6 py-4 text-right font-mono text-zinc-900 dark:text-zinc-100">${{ number_format($invoice->amount, 2) }}</td>
                            <td class="px-6 py-4 text-center">
                                <flux:select
                                    wire:model="status.{{ $invoice->id }}"
                                    wire:change="updateStatus({{ $invoice->id }}, $event.target.value)"
                                    size="sm"
                                >
                                    {{-- Al usar wire:model en el select padre,
                                         no necesitas @selected en las opciones --}}
                                    <flux:select.option value="pendiente">Pendiente</flux:select.option>
                                    <flux:select.option value="pagado">Pagado</flux:select.option>
                                </flux:select>
                            </td>
                            <td class="px-6 py-4 text-right">
                                <flux:button variant="ghost" size="sm">Ver</flux:button>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="px-6 py-12 text-center text-zinc-500">No hay facturas para este periodo.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
    <flux:modal name="generate-invoices" class="md:w-96">
        <div class="space-y-4">
            <h2 class="text-lg font-bold">Generar Facturas</h2>
            <p class="text-sm text-zinc-500">¿Desea generar los débitos automáticamente para el periodo seleccionado?</p>

            <div class="flex justify-end gap-2">
                <flux:modal.close>Cancelar</flux:modal.close>
                <flux:button wire:click="generateInvoices" variant="primary">Confirmar Generación</flux:button>
            </div>
        </div>
    </flux:modal>
</div>
