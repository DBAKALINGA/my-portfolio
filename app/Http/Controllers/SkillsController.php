<?php

namespace App\Http\Controllers;

class SkillsController extends Controller
{
    public function index()
    {
        $skills = [
            'Laravel',
            'PHP',
            'Java',
            'Python',
            'JavaScript',
            'MySQL',
            'Git',
            'GitHub',
            'Django',
            'Spring Boot',
            'Flutter'
        ];

        return view('skills', [
            'skills' => $skills
        ]);
    }
}