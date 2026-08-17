<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
      public function index()
    {
    $name = 'Fraigod Richard';
    $title = 'Software Developer';
    $description = 'I build web applications, software systems and intelligent technology solutions.';

    return view('home', [
        'name' => $name,
        'title' => $title,
        'description' => $description,
    ]);
}
}
