<?php

namespace App\Livewire\MembershipFee;

use Illuminate\View\View;
use Livewire\Attributes\Layout;
use Livewire\Component;

class MembershipFee extends Component
{
    #[Layout('components.layouts.app', ['title' => 'Cec - cuotas'])]
    public function render(): View
    {
        return view('livewire.membership-fee.membership-fee');
    }
}
