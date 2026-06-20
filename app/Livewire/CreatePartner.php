<?php

namespace App\Livewire;

use App\Models\Debit;
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
    }

    protected function rules()
    {
        return $this->partnerRules();
    }

    public function save()
    {
        $this->validate();

        $selectedIds = array_keys(array_filter($this->debitsToAssign));

        $newPartner = Partner::create([
            ...$this->only([
                'name', 'last_name', 'email', 'phone',
                'sexo', 'address', 'dni', 'date_of_birth', 'date_of_registration'
            ]),
            'active' => true,
        ]);

        $newPartner->debits()->sync($selectedIds);

        return redirect()->route('partners.show', $newPartner);
    }

    #[Layout('components.layouts.app', ['title' => 'Crear socio'])]
    public function render()
    {
        $allDebits = Debit::all();

        return view('livewire.partner.create-partner', [
            'allDebits' => $allDebits,
            'debitsToAssign' => $this->debitsToAssign
        ]);
    }
}
