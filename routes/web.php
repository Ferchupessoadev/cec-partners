<?php

use App\Livewire\Debits\Debits;
use App\Livewire\Debits\DebitsProcess;
use App\Livewire\CreatePartner;
use App\Livewire\EditPartner;
use App\Livewire\Partner;
use App\Livewire\Profile;
use App\Livewire\ShowPartner;
use Illuminate\Support\Facades\Route;

Route::get('/', fn() => view('welcome'))->name('home');

Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::get('/profile', Profile::class)
    ->middleware(['auth', 'verified'])
    ->name('profile.index');

Route::middleware(['auth', 'verified', 'admin'])->group(function () {
    // Partner
    Route::get('/partner', Partner::class)->name('partners.index');
    Route::get('/partner/create', CreatePartner::class)->name('partners.create');
    Route::get('/partner/{partner}', ShowPartner::class)->name('partners.show');
    Route::get('/partner/{partner}/edit', EditPartner::class)->name('partners.edit');

    // Debits
    Route::get('/debits', Debits::class)->name('debits.index');
    Route::get('/debits/process', DebitsProcess::class)->name('debitsProcess.index');
});
