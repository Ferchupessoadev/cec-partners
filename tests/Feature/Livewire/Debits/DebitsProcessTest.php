<?php

use App\Livewire\Debits\DebitsProcess;
use Livewire\Livewire;

it('renders successfully', function () {
    Livewire::test(DebitsProcess::class)
        ->assertStatus(200);
});
