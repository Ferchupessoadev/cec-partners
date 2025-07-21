@props(['propertieOfLivewire', 'socio'])


<div
    wire:show="{{ $propertieOfLivewire }}"
    class="flex flex-col absolute w-3/4 h-3/4 top-0 left-0 right-0 bottom-0 m-auto">
    <p>¿Desea eliminar el socio?</p>
    <button wire:click="deleteSocio({{$socio->id}})" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">Eliminar</button>
    <button wire:click="closeModal" class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded">Cancelar</button>
</div>
