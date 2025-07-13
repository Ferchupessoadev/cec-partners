<?php

use App\Livewire\EditPartner;
use Livewire\Livewire;

it('renders successfully', function () {
    Livewire::test(EditPartner::class)
        ->assertStatus(200);
});
