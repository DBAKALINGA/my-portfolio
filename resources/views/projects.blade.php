@extends('layouts.app')

@section('title', 'Projects & Events')

@section('content')

<!-- HERO HEADER -->
<section class="projects-hero">
    <div class="container">
        <p class="section-label"><i class="fa-solid fa-laptop-code me-1"></i> MY WORK & UPDATES</p>
        <h1 class="fw-bold text-dark">Projects & Events</h1>
        <p>
            A selection of projects and recent events posted directly from the admin dashboard.
        </p>
    </div>
</section>

<!-- FEATURED PROJECTS SECTION -->
<section class="section">
    <div class="container">
        <h2 class="section-title">Projects</h2>

        <div class="projects-grid">
            @forelse ($projects as $project)
                <article class="project-card">
                    <div>
                        @if($project->image)
                            <img src="{{ asset('storage/' . $project->image) }}" alt="{{ $project->title }}" class="img-fluid rounded mb-3" style="width:100%; height:190px; object-fit:cover;">
                        @endif

                        <h3>{{ $project->title }}</h3>
                        <p>{{ $project->description }}</p>

                        @if(!empty($project->technologies))
                            <div class="project-technologies">
                                @foreach (is_array($project->technologies) ? $project->technologies : explode(',', $project->technologies) as $tech)
                                    <span>{{ trim($tech) }}</span>
                                @endforeach
                            </div>
                        @endif
                    </div>

                    <div class="project-links">
                        @if($project->link)
                            <a href="{{ $project->link }}" target="_blank">
                                Live Demo <i class="fa-solid fa-arrow-up-right-from-square ms-1"></i>
                            </a>
                        @endif

                        @if($project->github)
                            <a href="{{ $project->github }}" target="_blank">
                                GitHub <i class="fa-brands fa-github ms-1"></i>
                            </a>
                        @endif
                    </div>
                </article>
            @empty
                <div class="col-12 text-center py-5">
                    <i class="fa-solid fa-folder-open fs-1 text-muted mb-3 d-block"></i>
                    <p class="text-muted">Hakuna projects zilizopostiwa na Admin kwa sasa.</p>
                </div>
            @endforelse
        </div>
    </div>
</section>

<!-- EVENTS SECTION -->
<section class="section bg-light py-5">
    <div class="container">
        <h2 class="section-title">Matukio (Events)</h2>

        <div class="projects-grid">
            @forelse ($events as $event)
                <article class="project-card">
                    <div>
                        @if($event->image)
                            <img src="{{ asset('storage/' . $event->image) }}" alt="{{ $event->title }}" class="img-fluid rounded mb-3" style="width:100%; height:190px; object-fit:cover;">
                        @endif

                        @if($event->event_date)
                            <span class="badge bg-primary-subtle text-primary mb-2">
                                <i class="fa-regular fa-calendar me-1"></i> {{ \Carbon\Carbon::parse($event->event_date)->format('d M, Y') }}
                            </span>
                        @endif

                        <h3>{{ $event->title }}</h3>
                        <p>{{ $event->description }}</p>
                    </div>
                </article>
            @empty
                <div class="col-12 text-center py-4">
                    <i class="fa-regular fa-calendar-xmark fs-2 text-muted mb-2 d-block"></i>
                    <p class="text-muted">Hakuna matukio yaliyopostiwa kwa sasa.</p>
                </div>
            @endforelse
        </div>
    </div>
</section>

@endsection