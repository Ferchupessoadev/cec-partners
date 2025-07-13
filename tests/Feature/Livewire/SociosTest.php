<?php

use App\Livewire\Socios;
use Livewire\Livewire;

it('renders successfully', function () {
    Livewire::test(Socios::class)
        ->assertStatus(200);
});
