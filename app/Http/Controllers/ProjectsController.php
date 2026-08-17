<?php

namespace App\Http\Controllers;

class ProjectsController extends Controller
{
    public function index()
    {
        $projects = [
            [
                'title' => 'My Portfolio',
                'description' => 'A personal developer portfolio built with Laravel and Blade.',
                'technologies' => ['Laravel', 'PHP', 'Blade', 'CSS'],
                'github' => 'https://github.com/DBAKALINGA/my-portfolio',
                'demo' => '#'
            ],

            [
                'title' => 'Hostel Management System',
                'description' => 'A system for managing students, hostel allocation and payments.',
                'technologies' => ['Spring Boot', 'Java', 'MySQL'],
                'github' => '#',
                'demo' => '#'
            ],

            [
                'title' => 'Hospital Appointment System',
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
}
