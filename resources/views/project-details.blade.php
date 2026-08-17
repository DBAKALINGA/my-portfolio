@extends('layouts.app')

@section('title', $project['title'])

@section('content')

<section class="section">

    <div class="container">

        <p class="section-label">
            PROJECT DETAILS
        </p>

        <h1>
            {{ $project['title'] }}
        </h1>

        <p>
            {{ $project['description'] }}
        </p>


        <h2>Technologies</h2>

        <div class="skills-grid">

            @foreach ($project['technologies'] as $technology)

                <span>
                    {{ $technology }}
                </span>

            @endforeach

        </div>


        <div class="project-links">

            <a href="{{ $project['github'] }}" target="_blank">
                GitHub →
            </a>

            <a href="{{ $project['demo'] }}" target="_blank">
                Live Demo →
            </a>

        </div>

    </div>

</section>

@endsection