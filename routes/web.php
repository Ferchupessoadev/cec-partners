<?php

use App\Livewire\EditPartner;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::get('/partners/{id}/edit', EditPartner::class)->name('partners.edit');

require __DIR__ . '/auth.php';
