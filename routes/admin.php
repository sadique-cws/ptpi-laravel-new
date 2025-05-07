<?php

use App\Livewire\Admin\Pages\Dashboard;
use App\Livewire\Admin\Pages\ManageCategory;
use Illuminate\Support\Facades\Route;


Route::get("/admin",Dashboard::class)->name('admin.dashboard');
Route::get("/admin/class-category",ManageCategory::class)->name('admin.class_category');

?>
