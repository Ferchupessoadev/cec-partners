<?php

namespace Tests\Feature\Livewire;

use App\Models\Partner;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Livewire\Livewire;
use Tests\TestCase;

class EditPartnerTest extends TestCase
{
    use RefreshDatabase;

    public function it_loads_the_partner_data()
    {
        $partner = Partner::factory()->create([
            'name' => 'Juan',
            'last_name' => 'Pérez',
            'email' => 'juan@example.com',
        ]);

        Livewire::test(\App\Livewire\EditPartner::class, ['id' => $partner->id])
            ->assertSet('name', 'Juan')
            ->assertSet('last_name', 'Pérez')
            ->assertSet('email', 'juan@example.com');
    }

    public function it_updates_the_partner()
    {
        $partner = Partner::factory()->create([
            'name' => 'Juan',
            'last_name' => 'Pérez',
            'email' => 'juan@example.com',
        ]);

        Livewire::test(\App\Livewire\EditPartner::class, ['id' => $partner->id])
            ->set('name', 'Carlos')
            ->set('last_name', 'Gómez')
            ->call('save');

        $this->assertDatabaseHas('partners', [
            'id' => $partner->id,
            'name' => 'Carlos',
            'last_name' => 'Gómez',
        ]);
    }
}
