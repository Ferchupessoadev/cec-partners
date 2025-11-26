<?php

namespace App\Livewire;

use App\Models\AssignedDebit;
use App\Models\Debits;
use App\Models\Partner;
use App\Traits\Partner\PartnerFields;
use Livewire\Attributes\Layout;
use Livewire\Component;

class CreatePartner extends Component
{
    use PartnerFields;

    public $debitsToAssign = [];

    public function mount()
    {
        $this->sexo = 'masculino';

        $debitsCount = Debits::count();

        for ($i = 0; $i < $debitsCount; $i++) {
            $this->debitsToAssign[] = false;
        }
    }

    protected function rules()
    {
        return $this->partnerRules();
    }

    public function save()
    {
        $this->validate();

        $newpartner = Partner::create([
            ...$this->only([
                'name', 'last_name', 'email', 'phone',
                'sexo', 'address', 'dni', 'date_of_birth', 'date_of_registration'
            ]),
            'active' => true,
        ]);

        $debits = Debits::all();

        foreach ($debits as $index => $debit) {
            $lastInstance = $debit->debitInstances()->orderBy('due_date', 'desc')->first();

            if ($lastInstance && $this->debitsToAssign[$index]) {
                AssignedDebit::firstOrCreate([
                    'partner_id' => $newpartner->id,
                    'debit_instances_id' => $lastInstance->id,
                ], [
                    'status' => 'pendiente',
                ]);
            }
        }

        $this->reset();

        return redirect()->route('partners.show', ['partner' => $newpartner]);
    }

    #[Layout('components.layouts.app', ['title' => 'Crear socio'])]
    public function render()
    {
        $allDebits = Debits::all();

        return view('livewire.create-partner', [
            'allDebits' => $allDebits,
            'debitsToAssign' => $this->debitsToAssign
        ]);
    }
}
