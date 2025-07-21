<?php

namespace App\Livewire\Debits;

use App\Models\Debits as AppDebits;
use Flux\Flux;
use Illuminate\View\View;
use Livewire\Attributes\Layout;
use Livewire\Component;

class Debits extends Component
{
    public $name;
    public $nameToDelete;
    public $amount;

    protected $rules = [
        'name' => 'required',
        'nameToDelete' => 'required',
        'amount' => ['required', 'numeric', 'min:0'],
    ];

    public function createDebit()
    {
        $this->validateOnly('name');
        $this->validateOnly('amount');

        AppDebits::create([
            'name' => $this->name,
            'amount' => $this->amount,
        ]);

        $this->reset(['name', 'amount']);

        Flux::modal('create-debit')->close();
    }

    public function deleteDebit($debitId)
    {
        $debit = AppDebits::find($debitId);

        $debit->delete();
    }

    #[Layout('components.layouts.app', ['title' => 'Tabla de Débitos'])]
    public function render(): View
    {
        return view('livewire.debits.debits', [
            'debits' => AppDebits::all(),
        ]);
    }
}
