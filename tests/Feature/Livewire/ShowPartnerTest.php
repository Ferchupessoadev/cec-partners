<?php

use App\Livewire\ShowPartner;
use Livewire\Livewire;

it('renders successfully', function () {
    Livewire::test(ShowPartner::class)
        ->assertStatus(200);
});
