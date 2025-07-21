<div class="w-full h-full flex flex-col justify-start items-center gap-2">
    <div class="mt-4 flex items-start gap-2 w-1/2">
        <flux:modal.trigger name="create-debit">
            <flux:button variant="primary">Crear debito</flux:button>
        </flux:modal.trigger>
    </div>
    <flux:modal name="create-debit" class="md:w-96">
        <div class="space-y-6">
            <div>
                <flux:heading size="lg">Agregar nuevo debito</flux:heading>
                <flux:text class="mt-2">Completa el siguiente formulario para agregar un nuevo debito.</flux:text>
            </div>
            <form class="space-y-10" wire:submit="createDebit">
                <flux:input type="text" label="Nombre" wire:model="name" />
                <flux:input type="number" label="Monto" wire:model="amount" />
                <flux:button type="submit" variant="primary">Guardar</flux:button>
            </form>
        </div>
    </flux:modal>
    <table class="w-1/2">
        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
            <tr class="text-left">
                <th class="px-2 py-3">ID</th>
                <th class="px-2 py-3">Name</th>
                <th class="px-2 py-3">Monto</th>
                <th class="px-2 py-3">Acciones</th>
            </tr>
        </thead>
        <tbody class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
            @foreach ($debits as $debit)
                <tr class="border-b dark:bg-gray-900 dark:border-gray-700">
                    <td class="px-2 py-3">{{ $debit->id }}</td>
                    <td class="px-2 py-3">{{ $debit->name }}</td>
                    <td class="px-2 py-3">${{ $debit->amount }}</td>
                    <td class="px-2 py-3">
                        <flux:icon wire:click="deleteDebit({{ $debit->id }})"  icon="trash" />
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>

