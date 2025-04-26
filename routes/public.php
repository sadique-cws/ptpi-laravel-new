<?php

use App\Livewire\Public\Pages\Contactpage;
use App\Livewire\Public\Pages\Homepage;
use App\Livewire\Public\Pages\LoginPage;
use App\Livewire\Public\Pages\RecruiterSignup;
use App\Livewire\Public\Pages\TeacherSignup;
use Illuminate\Support\Facades\Route;



// all public routes

Route::get("/", Homepage::class)->name("public.homepage");
Route::get("/contact", Contactpage::class)->name("public.contact");
Route::get("/login", LoginPage::class)->name("public.login");
Route::get("/recruiter-signup", RecruiterSignup::class)->name("public.recruiter-signup");
Route::get("/teacher-signup", TeacherSignup::class)->name("public.teacher-signup");


?>
