<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\Event;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $name = "Fraigod Richard";
        $title = "Software Developer";
        $description = "I build web applications, software systems and intelligent technology solutions.";
        $skills = ['Laravel', 'PHP', 'Java', 'Python', 'JavaScript', 'MySQL', 'Git', 'GitHub', 'Django', 'Spring Boot', 'Flutter', 'React', 'PostgreSQL'];

        // Vuta projects na events kutoka database
        $projects = Project::latest()->get();
        $events = Event::latest()->get();
         
        
        // Tuma data zote kwenye home.blade.php
        return view('home', compact('name', 'title', 'description', 'skills', 'projects', 'events'));
    }
}