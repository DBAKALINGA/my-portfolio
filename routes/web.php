<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\SkillsController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\ProjectsController;
use App\Http\Controllers\ContactController;
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/profile/{name}', [ProfileController::class, 'show'])->name('profile');
Route::get('/skills', [SkillsController::class, 'index'])->name('skills');
Route::get('/projects', [ProjectsController::class, 'index'])->name('projects');
Route::get('/about', [AboutController::class, 'index'])->name('about');
Route::get('/projects/{slug}', [ProjectsController::class, 'show'])
    ->name('projects.show');
// Onyesha fomu ya mawasiliano
Route::get('/contact', [ContactController::class, 'show'])->name('contact.show');

// Pokea na kuproses data kutoka kwenye fomu
Route::post('/contact', [ContactController::class, 'submit'])->name('contact.submit');