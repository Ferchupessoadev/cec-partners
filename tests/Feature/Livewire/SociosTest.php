<?php

use App\Livewire\Socios;
use Livewire\Livewire;

uses(\Illuminate\Foundation\Testing\RefreshDatabase::class);

it('renders successfully', function () {
    Livewire::test(Socios::class)
        ->assertStatus(200);
});
