<div class="flex flex-col gap-4">
    <flux:heading size="xl">Detalles del socio {{ $partner->name . ' ' . $partner->last_name }}</flux:heading>
    <div>
        <span>
            Nombre:
        </span>
        <span>
            {{ $partner->name }}
        </span>
    </div>
    <div>
        <span>
            Apellido:
        </span>
        <span>
            {{ $partner->last_name }}
        </span>
    </div>
    <div>
        <span>
            Sexo:
        </span>
        <span>
            {{ $partner->sexo }}
        </span>
    </div>
    <div>
        <span>
            DNI:
        </span>
        <span>
            {{ $partner->dni }}
        </span>
    </div>
    <div>
        <span>
            Fecha de registro:
        </span>
        <span>
            {{ $partner->date_of_registration->format('d/m/Y') }}
        </span>
    </div>
    <div>
        <span>
            Fecha de nacimiento:
        </span>
        <span>
            {{ $partner->date_of_birth->format('d/m/Y') }}
        </span>
    </div>
    <div>
        <span>
            Email:
        </span>
        <span>
            {{ $partner->email }}
        </span>
    </div>
    <div>
        <span>
            Direccion:
        </span>
        <span>
            {{ $partner->address }}
        </span>
    </div>
    <div>
        <span>
            Telefono:
        </span>
        <span>
            {{ $partner->phone }}
        </span>
    </div>
</div>
