<?php

use App\Livewire\MembershipFee\MembershipFee;
use Livewire\Livewire;

it('renders successfully', function () {
    Livewire::test(MembershipFee::class)
        ->assertStatus(200);
});
