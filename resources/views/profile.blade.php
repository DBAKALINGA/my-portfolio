@extends('layouts.app')

@section('title', 'Profile')

@section('content')

    <section>
        <h1>Welcome to My Portfolio</h1>

        <h2>Hello, {{ $name }}</h2>

        <p>
            Welcome to my portfolio. Feel free to explore my
            skills, projects and experience.
        </p>
    </section>

@endsection