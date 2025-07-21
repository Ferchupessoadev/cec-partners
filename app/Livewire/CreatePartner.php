<?php

namespace App\Livewire;

use App\Models\Debits;
use App\Models\Partner;
use App\Traits\Partner\PartnerFields;
use Flux\Flux;
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

    public function addDebit()
    {
        Flux::modal('add-debit')->close();

        $debitToAdd = Debits::where('name', $this->debitToAdd)->first();

        $this->debitsToAssign[] = debitToAdd;
    }

    protected function rules()
    {
        return $this->partnerRules();
    }

    public function save()
    {
        $this->validate();

        $partner = Partner::create([
            ...$this->only([
                'name', 'last_name', 'email', 'phone',
                'sexo', 'address', 'dni', 'date_of_birth', 'date_of_registration'
            ]),
            'active' => true,
        ]);

        $this->reset();

        return redirect()->route('partners.show', ['partner' => $partner]);
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
