<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\SkillsController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\ProjectsController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\RatingController;
use App\Http\Controllers\AdminController;
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
// Rating Route
Route::post('/rating', [RatingController::class, 'store'])->name('rating.store');

// Protected Routes (Lazima uwe umelogin)
Route::middleware(['auth', 'verified'])->group(function () {
    
   // Badala ya kuelekeza kwenye view('dashboard') ya Breeze:
Route::get('/dashboard', function () {
    return redirect()->route('admin.dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

    // Profile Routes (Hizi ndizo zilikosekana!)
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Admin Dashboard Routes
    Route::get('/admin/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');
    Route::patch('/admin/ratings/{id}/approve', [AdminController::class, 'approveRating'])->name('admin.ratings.approve');
    Route::delete('/admin/ratings/{id}', [AdminController::class, 'deleteRating'])->name('admin.ratings.delete');
    Route::delete('/admin/messages/{id}', [AdminController::class, 'deleteMessage'])->name('admin.messages.delete');
});

// Breeze Authentication Routes
require __DIR__.'/auth.php';