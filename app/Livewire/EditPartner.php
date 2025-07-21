<?php

namespace App\Livewire;

use App\Models\Partner;
use App\Traits\Partner\PartnerFields;
use Illuminate\View\View;
use Livewire\Attributes\Layout;
use Livewire\Component;

class EditPartner extends Component
{
    use PartnerFields;

    public $partner;

    protected function rules(): array
    {
        return $this->partnerRules();
    }

    public function mount(Partner $partner): void
    {
        $this->partner = $partner;
        $this->name = $this->partner->name;
        $this->last_name = $this->partner->last_name;
        $this->email = $this->partner->email;
        $this->sexo = $this->partner->sexo;
        $this->phone = $this->partner->phone;
        $this->address = $this->partner->address;
        $this->dni = $this->partner->dni;
        $this->date_of_birth = $this->partner->date_of_birth;
        $this->date_of_registration = $this->partner->date_of_registration;
    }

    public function save()
    {
        $this->validate();

        $this->partner->update([
            'name' => $this->name,
            'last_name' => $this->last_name,
            'email' => $this->email,
            'address' => $this->address,
            'sexo' => $this->sexo,
            'phone' => $this->phone,
            'dni' => $this->dni,
            'date_of_birth' => $this->date_of_birth,
            'date_of_registration' => $this->date_of_registration,
        ]);

        return redirect()->route('partners.show', ['partner' => $this->partner], 302);
    }

    #[Layout('components.layouts.app')]
    public function render(): View
    {
        return view('livewire.edit-partner');
    }
}
