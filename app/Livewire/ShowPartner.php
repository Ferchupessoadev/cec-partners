<?php

namespace App\Livewire;

use App\Models\Partner;
use Illuminate\View\View;
use Livewire\Attributes\Layout;
use Livewire\Component;

class ShowPartner extends Component
{
    protected $partner;

    public function mount(Partner $partner): void
    {
        $this->partner = $partner;
    }

    #[Layout('components.layouts.app', ['title' => 'Detalle socio'])]
    public function render(): View
    {
        return view('livewire.show-partner', [
            'partner' => $this->partner
        ]);
    }
}
