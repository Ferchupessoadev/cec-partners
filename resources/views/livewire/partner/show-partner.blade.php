<div class="max-w-4xl mx-auto p-6 space-y-8">
    {{-- Header --}}
    <div class="flex items-center justify-between border-b border-zinc-700 pb-6">
        <flux:heading size="xl">Detalles de {{ $partner->name }} {{ $partner->last_name }}</flux:heading>
        <flux:button variant="subtle" icon="arrow-left" onclick="history.back()">Volver</flux:button>
    </div>

    {{-- Grid de Información --}}
    <div class="grid md:grid-cols-2 gap-8">
        {{-- Bloque Personal --}}
        <div class="space-y-4">
            <h3 class="text-sm font-bold uppercase tracking-wider text-zinc-500">Información Personal</h3>
            <div class="bg-zinc-800 rounded-lg p-4 space-y-3">
                @foreach([
                    ['label' => 'Nombre', 'value' => $partner->name],
                    ['label' => 'Apellido', 'value' => $partner->last_name],
                    ['label' => 'Sexo', 'value' => ucfirst($partner->sexo)],
                    ['label' => 'DNI', 'value' => $partner->dni],
                    ['label' => 'Fecha de nacimiento', 'value' => $partner->date_of_birth->format('d/m/Y')],
                    ['label' => 'Fecha de inscripción', 'value' => $partner->date_of_registration->format('d/m/Y')],
                ] as $item)
                    <div class="flex justify-between border-b border-zinc-700 last:border-0 pb-2 last:pb-0">
                        <span class="text-zinc-400">{{ $item['label'] }}</span>
                        <span class="font-medium text-white">{{ $item['value'] }}</span>
                    </div>
                @endforeach
            </div>
        </div>

        {{-- Bloque Contacto --}}
        <div class="space-y-4">
            <h3 class="text-sm font-bold uppercase tracking-wider text-zinc-500">Contacto</h3>
            <div class="bg-zinc-800 rounded-lg p-4 space-y-3">
                @foreach([
                    ['label' => 'Email', 'value' => $partner->email ?? 'No registrado'],
                    ['label' => 'Dirección', 'value' => $partner->address ?? 'No registrado'],
                    ['label' => 'Teléfono', 'value' => $partner->phone ?? 'No registrado'],
                ] as $item)
                    <div class="flex justify-between border-b border-zinc-700 last:border-0 pb-2 last:pb-0">
                        <span class="text-zinc-400">{{ $item['label'] }}</span>
                        <span class="font-medium text-white">{{ $item['value'] }}</span>
                    </div>
                @endforeach
            </div>
        </div>
    </div>

    {{-- Debitos --}}
    <div class="space-y-4">
        <h3 class="text-sm font-bold uppercase tracking-wider text-zinc-500">Débitos asignados</h3>
        <div class="bg-zinc-800 rounded-lg overflow-hidden border border-zinc-700">
            @if (count($partner->debits) > 0)
                <table class="w-full text-left">
                    <thead class="bg-zinc-900/50">
                        <tr>
                            <th class="px-6 py-3 text-xs uppercase text-zinc-400">Nombre</th>
                            <th class="px-6 py-3 text-xs uppercase text-zinc-400">Monto</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-zinc-700">
                        @foreach ($partner->debits as $debit)
                            <tr>
                                <td class="px-6 py-4">{{ $debit->name }}</td>
                                <td class="px-6 py-4 font-mono">${{ number_format($debit->amount, 2) }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            @else
                <p class="p-6 text-center text-zinc-400">No hay débitos asignados a este socio.</p>
            @endif
        </div>
    </div>
</div>
