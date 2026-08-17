<?php

namespace App\Http\Controllers;

class ProjectsController extends Controller
{
    public function index()
{
    $projects = [
        [
            'title' => 'My Portfolio',
            'slug' => 'my-portfolio',
            'description' => 'A personal developer portfolio built with Laravel and Blade.',
            'technologies' => ['Laravel', 'PHP', 'Blade', 'CSS'],
            'github' => 'https://github.com/DBAKALINGA/my-portfolio',
            'demo' => '#'
        ],

        [
            'title' => 'Hostel Management System',
            'slug' => 'hostel-management-system',
            'description' => 'A system for managing students, hostel allocation and payments.',
            'technologies' => ['Spring Boot', 'Java', 'MySQL'],
            'github' => '#',
            'demo' => '#'
        ],

        [
            'title' => 'Hospital Appointment System',
            'slug' => 'hospital-appointment-system',
            'description' => 'A web application for managing hospital appointments.',
            'technologies' => ['Django', 'Python', 'MySQL'],
            'github' => '#',
            'demo' => '#'
        ],
    ];

    return view('projects', [
        'projects' => $projects
    ]);
}
    public function show($slug)
{
    $projects = [
        [
            'title' => 'My Portfolio',
            'slug' => 'my-portfolio',
            'description' => 'A personal developer portfolio built with Laravel and Blade.',
            'technologies' => ['Laravel', 'PHP', 'Blade', 'CSS'],
            'github' => 'https://github.com/DBAKALINGA/my-portfolio',
            'demo' => '#'
        ],

        [
            'title' => 'Hostel Management System',
            'slug' => 'hostel-management-system',
            'description' => 'A system for managing students, hostel allocation and payments.',
            'technologies' => ['Spring Boot', 'Java', 'MySQL'],
            'github' => '#',
            'demo' => '#'
        ],

        [
            'title' => 'Hospital Appointment System',
            'slug' => 'hospital-appointment-system',
            'description' => 'A web application for managing hospital appointments.',
            'technologies' => ['Django', 'Python', 'MySQL'],
            'github' => '#',
            'demo' => '#'
        ],
    ];

    foreach ($projects as $project) {

        if ($project['slug'] === $slug) {

            return view('project-details', [
                'project' => $project
            ]);

        }
    }

    abort(404);
}
}
