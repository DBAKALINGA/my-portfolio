@extends('layouts.app')

@section('title', 'Home')

@section('content')

<!-- HERO SECTION -->
<section class="hero">
    <div class="container hero-content">
        <div class="hero-text">
            <p class="greeting"><i class="fa-solid fa-code me-1"></i> Hello, I'm</p>
            <h1>{{ $name }}</h1>
            <h2>{{ $title }}</h2>
            <p class="hero-description">{{ $description }}</p>

            <div class="hero-buttons">
                <a href="#projects" class="btn primary">
                    <i class="fa-solid fa-laptop-code me-1"></i> View My Projects
                </a>
                <a href="#contact" class="btn secondary">
                    <i class="fa-regular fa-paper-plane me-1"></i> Contact Me
                </a>
            </div>

            <div class="social-links">
                <a href="https://github.com/DBAKALINGA" target="_blank">
                    <i class="fa-brands fa-github me-1"></i> GitHub
                </a>
                <a href="#" target="_blank">
                    <i class="fa-brands fa-linkedin me-1"></i> LinkedIn
                </a>
                <a href="mailto:fraigodrichard@gmail.com" target="_blank">
                    <i class="fa-regular fa-envelope me-1"></i> Email
                </a>
            </div>
        </div>

        <div class="hero-image">
            <div class="profile-circle">GODY</div>
        </div>
    </div>
</section>

<!-- ABOUT SECTION -->
<section id="about" class="section">
    <div class="container">
        <div class="section-label">Overview</div>
        <h2>About Me</h2>
        <p style="color: var(--text-muted); max-width: 700px; line-height: 1.7; font-size: 16px;">
            I am a passionate software developer interested in building modern web applications and technology solutions.
        </p>
    </div>
</section>

<!-- SKILLS SECTION -->
<section id="skills" class="section">
    <div class="container">
        <div class="section-label">Expertise</div>
        <h2>My Skills</h2>
        <div class="skills-grid">
            @foreach ($skills as $skill)
                <span><i class="fa-solid fa-circle-check text-info me-1"></i> {{ $skill }}</span>
            @endforeach
        </div>
    </div>
</section>

<!-- PROJECTS SECTION -->
<section id="projects" class="section">
    <div class="container">
        <div class="section-label">Works</div>
        <h2>Featured Projects</h2>

        <div class="projects-grid">
            @forelse ($projects as $project)
                <article class="project-card">
                    <div>
                        @if($project->image)
                            <img src="{{ asset('storage/' . $project->image) }}" alt="{{ $project->title }}" style="width:100%; height:180px; object-fit:cover; border-radius:8px; margin-bottom:15px;">
                        @endif

                        <h3>{{ $project->title }}</h3>
                        <p>{{ $project->description }}</p>
                    </div>

                    @if($project->link)
                        <div style="margin-top: 15px;">
                            <a href="{{ $project->link }}" target="_blank">
                                View Project <i class="fa-solid fa-arrow-right-long ms-1"></i>
                            </a>
                        </div>
                    @endif
                </article>
            @empty
                <p style="grid-column: 1 / -1; text-align: center; color: var(--text-muted); padding: 40px 0;">
                    <i class="fa-solid fa-folder-open fs-2 d-block mb-2"></i> Hakuna projects zilizopostiwa kwa sasa.
                </p>
            @endforelse
        </div>
    </div>
</section>

<!-- EVENTS / MATUKIO SECTION -->
<section id="events" class="section">
    <div class="container">
        <div class="section-label">Updates</div>
        <h2>Matukio ya Hivi Karibuni</h2>

        <div class="projects-grid">
            @forelse ($events as $event)
                <article class="project-card">
                    <div>
                        @if($event->image)
                            <img src="{{ asset('storage/' . $event->image) }}" alt="{{ $event->title }}" style="width:100%; height:180px; object-fit:cover; border-radius:8px; margin-bottom:15px;">
                        @endif

                        @if($event->event_date)
                            <small style="color: var(--accent-blue); font-weight: 600; display: inline-block; background: rgba(56, 189, 248, 0.1); padding: 4px 12px; border-radius: 20px; margin-bottom: 12px;">
                                <i class="fa-regular fa-calendar me-1"></i> {{ \Carbon\Carbon::parse($event->event_date)->format('d M, Y') }}
                            </small>
                        @endif

                        <h3>{{ $event->title }}</h3>
                        <p>{{ $event->description }}</p>
                    </div>
                </article>
            @empty
                <p style="grid-column: 1 / -1; text-align: center; color: var(--text-muted); padding: 40px 0;">
                    <i class="fa-regular fa-calendar-xmark fs-2 d-block mb-2"></i> Hakuna matukio yaliyopostiwa kwa sasa.
                </p>
            @endforelse
        </div>
    </div>
</section>

<!-- CONTACT SECTION -->
<section id="contact" class="section">
    <div class="container">
        <div class="contact-section">
            <h2 style="margin-bottom: 10px;">Let's Work Together</h2>
            <p style="color: var(--text-muted); margin-bottom: 25px;">Have a project or opportunity? Feel free to contact me.</p>
            <a href="mailto:fraigodrichard@gmail.com" class="btn primary">
                <i class="fa-solid fa-envelope me-1"></i> Get In Touch
            </a>
        </div>
    </div>
</section>

@endsection