<?php

namespace App\Livewire;

use App\Models\Partner;
use Livewire\Component;

class EditPartner extends Component
{
    public $id;
    public $partner;
    public $name;
    public $last_name;
    public $email;
    public $dni;
    public $date_of_birth;
    public $date_of_registration;

    public function mount()
    {
        $this->partner = Partner::findOrFail($this->id);

        $this->name = $this->partner->name;
        $this->last_name = $this->partner->last_name;
        $this->email = $this->partner->email;
        $this->dni = $this->partner->dni;
        $this->date_of_birth = $this->partner->date_of_birth;
        $this->date_of_registration = $this->partner->date_of_registration;
    }

    public function save()
    {
        $this->partner->update([
            'name' => $this->name,
            'last_name' => $this->last_name,
            'email' => $this->email,
            'dni' => $this->dni,
            'date_of_birth' => $this->date_of_birth,
            'date_of_registration' => $this->date_of_registration,
        ]);

        return redirect()->route('dashboard');
    }

    #[Layout('components.layouts.app')]
    public function render()
    {
        return view('livewire.edit-partner');
    }
}
