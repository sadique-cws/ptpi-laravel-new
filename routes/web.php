<?php

use Illuminate\Support\Facades\Route;
use Livewire\Volt\Volt;


Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::middleware(['auth'])->group(function () {
    Route::redirect('settings', 'settings/profile');

    Volt::route('settings/profile', 'settings.profile')->name('settings.profile');
    Volt::route('settings/password', 'settings.password')->name('settings.password');
    Volt::route('settings/appearance', 'settings.appearance')->name('settings.appearance');
});

require __DIR__.'/auth.php';


// import public routes
require __DIR__.'/public.php';

// import admin routes
require __DIR__.'/admin.php';

// import teacher routes
require __DIR__.'/teacher.php';

// import recruiter routes
require __DIR__.'/recruiter.php';

//exam setter routes
require __DIR__.'/examsetter.php';
