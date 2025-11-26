<?php

use App\Livewire\ShowPartner;
use App\Models\Partner;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Livewire\Livewire;

uses(RefreshDatabase::class);

it('renders successfully', function () {
    $partner = Partner::factory()->create();
    Livewire::test(ShowPartner::class, ['partner' => $partner])
        ->assertStatus(200);
});
