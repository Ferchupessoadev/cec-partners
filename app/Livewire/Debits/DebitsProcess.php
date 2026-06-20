<?php

namespace App\Livewire\Debits;

use App\Models\Invoice;
use Livewire\Component;
use Livewire\Attributes\Url;
use Livewire\WithPagination;

class DebitsProcess extends Component
{
    use WithPagination;

    #[Url]
    public $period = '';

    #[Url]
    public $search = '';

    public function mount()
    {
        $this->period = $this->period ?: now()->format('Y-m');
    }

    public function generateInvoices()
    {
        //
    }

    public function render()
    {
        $invoices = Invoice::with(['partner', 'debit'])
            ->where('period', $this->period)
            ->when($this->search, function($query) {
                $query->whereHas('partner', fn($q) => $q->where('name', 'like', "%{$this->search}%"));
            })
            ->latest()
            ->paginate(15);

        return view('livewire.debits.debits-process', compact('invoices'));
    }
}
