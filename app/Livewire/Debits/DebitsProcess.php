<?php

namespace App\Livewire\Debits;

use Livewire\Attributes\Layout;
use Livewire\Component;

class DebitsProcess extends Component
{
    #[Layout('components.layouts.app', ['title' => 'Procesar Débitos'])]
    public function render()
    {
        return view('livewire.debits.debits-process');
    }
}
