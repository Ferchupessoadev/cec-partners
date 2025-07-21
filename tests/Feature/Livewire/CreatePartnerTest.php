<?php

use App\Livewire\CreatePartner;
use Livewire\Livewire;

it('renders successfully', function () {
    Livewire::test(CreatePartner::class)
        ->assertStatus(200);
});
