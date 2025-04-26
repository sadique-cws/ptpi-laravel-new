<?php

use App\Livewire\Public\Pages\Contactpage;
use App\Livewire\Public\Pages\Homepage;
use Illuminate\Support\Facades\Route;



// all public routes

Route::get("/", Homepage::class)->name("public.homepage");
Route::get("/contact", Contactpage::class)->name("public.contact");

?>
