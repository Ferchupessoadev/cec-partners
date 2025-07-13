<?php

namespace App\Livewire;

use App\Models\Partner;
use Illuminate\View\View;
use Livewire\Attributes\Layout;
use Livewire\Component;
use Livewire\WithPagination;

class Socios extends Component
{
    use WithPagination;

    public function destroy($id): void
    {
        try {
            Partner::findOrFail($id)->delete();
            $this->dispatch('alert', type: 'success', message: 'Socio eliminado');
        } catch (\Exception $e) {
            return;
        }
        $this->resetPage();
    }

    #[Layout('components.layouts.app')]
    public function render(): View
    {
        return view(
            'livewire.socios',
            [
                'socios' => Partner::paginate(10, pageName: 'socios'),
            ]
        );
    }
}
