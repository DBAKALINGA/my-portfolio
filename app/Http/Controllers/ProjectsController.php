<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\Event;
use Illuminate\Http\Request;

class ProjectsController extends Controller
{
    /**
     * Display a listing of projects and events.
     */
    public function index()
    {
        // Kuchukua projects zote kuanzia mpya zaidi (Latest)
        $projects = Project::latest()->get();

        // Kuchukua events zote kuanzia mpya zaidi (Latest)
        $events = Event::latest()->get();

        // Kutuma data kwenda kwenye view ya 'projects.blade.php'
        return view('projects', compact('projects', 'events'));
    }
}