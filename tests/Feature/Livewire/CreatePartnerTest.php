<?php

use App\Livewire\CreatePartner;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Livewire\Livewire;

uses(RefreshDatabase::class);

it('renders successfully', function () {
    Livewire::test(CreatePartner::class, ['debitsToAssign' => []])
        ->assertStatus(200);
});
