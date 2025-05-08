<?php

use App\Livewire\Teacher\Pages\Attempts;
use App\Livewire\Teacher\Pages\Dashboard;
use App\Livewire\Teacher\Pages\JobProfile;
use App\Livewire\Teacher\Pages\Profile;
use Illuminate\Support\Facades\Route;

Route::middleware(["userRole","auth"])->group(function(){
    Route::prefix('teacher')->group(function (){
        Route::get('/dashboard', Dashboard::class)->name('teacher.dashboard');
        Route::get('/profile', Profile::class)->name('teacher.profile');
        Route::get('/jobProfile', JobProfile::class)->name('teacher.jobProfile');
        Route::get('/attempts', Attempts::class)->name('teacher.attempts');
    });
});
