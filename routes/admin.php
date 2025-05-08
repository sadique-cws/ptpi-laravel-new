<?php

use App\Livewire\Admin\Pages\Dashboard;
use App\Livewire\Admin\Pages\ManageCategory;
use App\Livewire\Admin\Pages\ManageLevel;
use App\Livewire\Admin\Pages\ManageSubject;
use Illuminate\Support\Facades\Route;


Route::middleware(["userRole","auth"])->group(function(){
    Route::get("/admin",Dashboard::class)->name('admin.dashboard');
    Route::get("/admin/class-category",ManageCategory::class)->name('admin.class_category');
    Route::get("/admin/manage-subjects",ManageSubject::class)->name('admin.subjects');
    Route::get("/admin/manage-levels",ManageLevel::class)->name("admin.levels");
});
?>
