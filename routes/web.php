<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return "Hello Welcome To My Portfolio, ";
});
Route::get('/profile/{name}', function ($name){
     return "Hello Welcome To My Portfolio," . $name;
});