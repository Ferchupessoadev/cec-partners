<?php

use App\Livewire\Debits\Debits;
use Livewire\Livewire;

it('renders successfully', function () {
    Livewire::test(Debits::class)
        ->assertStatus(200);
});
