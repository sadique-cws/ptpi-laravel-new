<?php

use App\Livewire\Admin\Pages\ClassCategory;
use App\Livewire\Admin\Pages\Dashboard;
use Illuminate\Support\Facades\Route;



// all public routes

Route::get("/admin",Dashboard::class)->name('admin.dashboard');
Route::get("/admin/class-category",ClassCategory::class)->name('admin.class_category');

?>
