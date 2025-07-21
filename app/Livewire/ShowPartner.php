<?php

namespace App\Livewire;

use App\Models\Partner;
use Livewire\Attributes\Layout;
use Livewire\Component;

class ShowPartner extends Component
{
    protected $partner;

    public function mount(Partner $partner)
    {
        $this->partner = $partner;
    }

    #[Layout('components.layouts.app', ['title' => 'Detalle socio'])]
    public function render()
    {
        return view('livewire.show-partner', [
            'partner' => $this->partner
        ]);
    }
}
