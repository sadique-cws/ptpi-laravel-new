<?php

use App\Livewire\Admin\Pages\Dashboard;
use App\Livewire\Admin\Pages\ManageCategory;
use App\Livewire\Admin\Pages\ManageExam;
use App\Livewire\Admin\Pages\ManageLevel;
use App\Livewire\Admin\Pages\ManageQuestions;
use App\Livewire\Admin\Pages\ManageSubject;
use App\Livewire\Admin\Pages\ManageTeacher;
use App\Livewire\Admin\Pages\ViewTeacher;
use Illuminate\Support\Facades\Route;


Route::middleware(["userRole","auth"])->group(function(){
    Route::get("/admin",Dashboard::class)->name('admin.dashboard');
    Route::get("/admin/class-category",ManageCategory::class)->name('admin.class_category');
    Route::get("/admin/manage-subjects",ManageSubject::class)->name('admin.subjects');
    Route::get("/admin/manage-levels",ManageLevel::class)->name("admin.levels");
    Route::get("/admin/manage-exam",ManageExam::class)->name("admin.exam");
    Route::get("/admin/manage-teacher",ManageTeacher::class)->name("admin.teacher");
    Route::get("/admin/teacher/{id}",ViewTeacher::class)->name("admin.teacher.view");
    Route::get("/admin/exam/{examId}/questions", ManageQuestions::class)->name("admin.exam.questions");
});
?>
