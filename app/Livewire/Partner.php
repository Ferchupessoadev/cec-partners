<?php

namespace App\Livewire;

use App\Models\Partner as PartnerModel;
use Illuminate\View\View;
use Livewire\Attributes\Layout;
use Livewire\Component;
use Livewire\WithPagination;

class Partner extends Component
{
    use WithPagination;

    public $showModalToDelete;
    public $partnerToDelete;
    public $search = '';

    public function mount()
    {
        $this->showModalToDelete = false;
        $this->partnerToDelete = null;
    }

    public function destroy(): void
    {
        try {
            PartnerModel::findOrFail($this->partnerToDelete)->delete();
        } catch (\Exception $e) {
            return;
        }
        $this->resetPage();

        $this->showModalToDelete = false;
        $this->partnerToDelete = null;
    }

    #[Layout('components.layouts.app', ['title' => 'Cec - Socios'])]
    public function render(): View
    {
        $socios = PartnerModel::query()
            ->when($this->search, function ($query) {
                $query->where(function ($q) {
                    $q
                        ->where('name', 'like', "%{$this->search}%")
                        ->orWhere('last_name', 'like', "%{$this->search}%")
                        ->orWhere('dni', 'like', "%{$this->search}%");
                });
            })
            ->orderBy('id')
            ->paginate(8);

        return view('livewire.socios', ['socios' => $socios]);
    }
}
