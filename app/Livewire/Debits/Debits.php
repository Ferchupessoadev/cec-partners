<?php

namespace App\Livewire\Debits;

use App\Models\Debit;
use Flux\Flux;
use Illuminate\View\View;
use Livewire\Attributes\Layout;
use Livewire\Component;

class Debits extends Component
{
    public $name;
    public $nameToDelete;
    public $amount;
    public $nameToEdit;
    public $amountToEdit;

    protected $rules = [
        'name' => ['required', 'string', 'max:255'],
        'nameToDelete' => ['required', 'string', 'max:255'],
        'amount' => ['required', 'numeric', 'min:0'],
        'nameToEdit' => ['required', 'string', 'max:255'],
        'amountToEdit' => ['required', 'numeric', 'min:0'],
    ];

    public function loadDebitToEdit(int $debitId)
    {
        $debit = Debit::find($debitId);

        $this->nameToEdit = $debit->name;
        $this->amountToEdit = $debit->amount;
    }

    public function createDebit()
    {
        $this->validateOnly('name');
        $this->validateOnly('amount');

        Debit::create([
            'name' => $this->name,
            'amount' => $this->amount,
        ]);

        $this->reset(['name', 'amount']);

        Flux::modal('create-debit')->close();
    }

    public function deleteDebit(int $debitId)
    {
        $debit = Debit::find($debitId);

        $debit->delete();
    }

    public function editDebit(int $debitId)
    {
        $this->validateOnly('nameToEdit');
        $this->validateOnly('amountToEdit');

        $debit = Debit::find($debitId);

        $debit->update([
            'name' => $this->nameToEdit,
            'amount' => $this->amountToEdit
        ]);

        Flux::modal('edit-debit-' . $debitId)->close();
    }

    #[Layout('components.layouts.app', ['title' => 'Tabla de Débitos'])]
    public function render(): View
    {
        return view('livewire.debits.debits', [
            'debits' => Debit::all(),
        ]);
    }
}
