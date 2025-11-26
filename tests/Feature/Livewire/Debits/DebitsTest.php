<?php

use App\Livewire\Debits\Debits;
use Livewire\Livewire;

uses(\Illuminate\Foundation\Testing\RefreshDatabase::class);

it('renders successfully', function () {
    Livewire::test(Debits::class)
        ->assertStatus(200);
});
