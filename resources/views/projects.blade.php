@extends('layouts.app')

@section('title', 'Projects')

@section('content')

<section class="projects-hero">

    <div class="container">

        <p class="section-label">MY WORK</p>

        <h1>My Projects</h1>

        <p>
            A selection of projects I have built while learning,
            experimenting and solving real-world problems.
        </p>

    </div>

</section>


<section class="section">

    <div class="container">

        <div class="projects-grid">

            @foreach ($projects as $project)

                <article class="project-card">

                    <h2>
                        {{ $project['title'] }}
                    </h2>

                    <p>
                        {{ $project['description'] }}
                    </p>


                    <div class="project-technologies">

                        @foreach ($project['technologies'] as $technology)

                            <span>
                                {{ $technology }}
                            </span>

                        @endforeach

                    </div>


                    <div class="project-links">
                    <a href="{{ route('projects.show', ['slug' => $project['slug']]) }}">
                        View Details →
                           </a>
                        <a href="{{ $project['github'] }}"
                           target="_blank">
                            GitHub →
                        </a>

                        <a href="{{ $project['demo'] }}"
                           target="_blank">
                            Live Demo →
                        </a>

                    </div>

                </article>

            @endforeach

        </div>

    </div>

</section>

@endsection