<?php

use App\Livewire\Recruiter\Pages\Dashboard;
use Illuminate\Support\Facades\Route;

Route::middleware(["userRole","auth"])->group(function(){
    Route::prefix('recruiter')->group(function (){
        Route::get('/dashboard', Dashboard::class)->name('recruiter.dashboard');
    });
});
