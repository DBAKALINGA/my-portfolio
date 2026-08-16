<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;

Route::get('/', function () {
    return "Hello Welcome To My Portfolio, ";
});
Route::get('/profile/{name}', [ProfileController::class, 'show']);