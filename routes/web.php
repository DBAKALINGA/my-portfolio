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
use App\Http\Controllers\Admin\ProjectController;
use App\Http\Controllers\Admin\EventController;

// Public Routes (Hazihitaji Login)
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/profile/{name}', [ProfileController::class, 'show'])->name('profile');
Route::get('/skills', [SkillsController::class, 'index'])->name('skills');
Route::get('/projects', [ProjectsController::class, 'index'])->name('projects');
Route::get('/about', [AboutController::class, 'index'])->name('about');
Route::get('/projects/{slug}', [ProjectsController::class, 'show'])->name('projects.show');

// Fomu ya mawasiliano & Rating
Route::get('/contact', [ContactController::class, 'show'])->name('contact.show');
Route::post('/contact', [ContactController::class, 'submit'])->name('contact.submit');
Route::post('/rating', [RatingController::class, 'store'])->name('rating.store');


// ==========================================
// PROTECTED ROUTES (LAZIMA UWE UMELOGIN)
// ==========================================
Route::middleware(['auth', 'verified'])->group(function () {
    
    // Redirect /dashboard kwenda /admin/dashboard
    Route::get('/dashboard', function () {
        return redirect()->route('admin.dashboard');
    })->name('dashboard');

    // Profile Routes
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // ALL ADMIN ROUTES (Zote ziko chini ya /admin)
    Route::prefix('admin')->name('admin.')->group(function () {
        
        // Dashboard Main
        Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('dashboard');
        
        // Ratings & Messages
        Route::patch('/ratings/{id}/approve', [AdminController::class, 'approveRating'])->name('ratings.approve');
        Route::delete('/ratings/{id}', [AdminController::class, 'deleteRating'])->name('ratings.delete');
        Route::delete('/messages/{id}', [AdminController::class, 'deleteMessage'])->name('messages.delete');

        // Projects & Events Resources
        Route::resource('projects', ProjectController::class);
        Route::resource('events', EventController::class);
    });

});

// Breeze Authentication Routes
require __DIR__.'/auth.php';