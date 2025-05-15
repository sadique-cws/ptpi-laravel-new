<?php

use App\Livewire\Questionsetter\Pages\Dashboard;
use Illuminate\Support\Facades\Route;

Route::middleware(["userRole","auth"])->group(function(){
    Route::prefix('examsetter')->group(function (){
        Route::get('/dashboard', Dashboard::class)->name('examsetter.dashboard');
    });
});