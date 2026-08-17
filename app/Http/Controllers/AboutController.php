<?php

namespace App\Http\Controllers;

class AboutController extends Controller
{
    public function index()
    {
        $name = 'Fraigod Richard';

        $role = 'Software Developer';

        $description = 'I am a passionate software developer focused on building modern, secure and user-friendly software solutions. I enjoy turning ideas into practical systems that solve real-world problems.';

        $interests = [
            'Web Development',
            'Software Engineering',
            'Artificial Intelligence',
            'Cybersecurity',
            'Database Systems',
            'Mobile Application Development'
        ];

        return view('about', [
            'name' => $name,
            'role' => $role,
            'description' => $description,
            'interests' => $interests
        ]);
    }
}