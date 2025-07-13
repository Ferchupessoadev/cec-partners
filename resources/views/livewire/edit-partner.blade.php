<form method="POST" wire:submit="save">
    @csrf
    @method('PUT')

    <div class="space-y-6 flex flex-col">
        <flux:input wire:model="name" :label="__('Name')" type="text" required value="{{ $partner->name }}" />
        <flux:input wire:model="last_name" :label="__('Last name')" type="text" required value="{{ $partner->last_name }}" />
        <flux:input wire:model="email" :label="__('Email')" type="email" required value="{{ $partner->email }}" />
        <flux:input wire:model="date_of_birth" :label="__('Date of birth')" type="date" required value="{{ $partner->date_of_birth }}" />
        <flux:input wire:model="dni" :label="__('DNI')" type="text" required value="{{ $partner->dni }}" />
        <flux:input wire:model="date_of_registration" :label="__('Date of registration')" type="date" required value="{{ $partner->date_of_registration }}" />

        <button type="submit">Save</button>

    </div>
</form>
