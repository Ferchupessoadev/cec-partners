<flux:modal wire:model="showModalToDelete">
    <div class="flex flex-col w-max h-max p-8 gap-5">
        <p>¿Desea eliminar el socio?</p>
        <div class="flex gap-2">
            <flux:button
                variant="danger"
                wire:click="destroy()"
                class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded cursor-pointer"
            >
                Eliminar
            </flux:button>

            <flux:button
                variant="subtle"
                x-on:click="$wire.showModalToDelete = false; $wire.partnerToDelete = null"
                class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded cursor-pointer"
            >
                Cancelar
            </flux:button>
        </div>
    </div>
</flux:modal>
