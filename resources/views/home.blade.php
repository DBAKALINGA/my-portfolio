@extends('layouts.app')

@section('title', 'Home')

@section('content')

<section class="hero">

    <div class="container hero-content">

        <div class="hero-text">

            <p class="greeting">
                Hello, I'm
            </p>

            <h1>
                {{ $name }}
            </h1>

            <h2>
                {{ $title }}
            </h2>

            <p class="hero-description">
                {{ $description }}
            </p>

            <div class="hero-buttons">

                <a href="#projects" class="btn primary">
                    View My Projects
                </a>

                <a href="#contact" class="btn secondary">
                    Contact Me
                </a>

            </div>

            <div class="social-links">

                <a href="https://github.com/DBAKALINGA" target="_blank">
                    GitHub
                </a>

                <a href="#" target="_blank">
                    LinkedIn
                </a>

                <a href="fraigodrichard@gmail.com" target="_blank">
                    Email
                </a>

            </div>

        </div>


        <div class="hero-image">

            <div class="profile-circle">
                FR
            </div>

        </div>

    </div>

</section>


<section id="about" class="section">

    <div class="container">

        <h2>About Me</h2>

        <p>
            I am a passionate software developer interested in
            building modern web applications and technology solutions.
        </p>

    </div>

</section>


<section id="skills" class="section">

    <div class="container">

        <h2>My Skills</h2>

    <div class="skills-grid">

    @foreach ($skills as $skill)

        <span>{{ $skill }}</span>

    @endforeach

</div>

    </div>

</section>


<section id="projects" class="section">

    <div class="container">

        <h2>Featured Projects</h2>

        <div class="projects-grid">

            <article class="project-card">

                <h3>Portfolio Website</h3>

                <p>
                    A personal portfolio built using Laravel,
                    Blade and modern web technologies.
                </p>

                <a href="#">
                    View Project →
                </a>

            </article>


            <article class="project-card">

                <h3>Hostel Management System</h3>

                <p>
                    A system designed to manage students,
                    hostel allocation and payments.
                </p>

                <a href="#">
                    View Project →
                </a>

            </article>


            <article class="project-card">

                <h3>Hospital Appointment System</h3>

                <p>
                    A web-based system for managing
                    hospital appointments.
                </p>

                <a href="#">
                    View Project →
                </a>

            </article>

        </div>

    </div>

</section>


<section id="contact" class="section contact-section">

    <div class="container">

        <h2>Let's Work Together</h2>

        <p>
            Have a project or opportunity? Feel free to contact me.
        </p>

        <a href="mailto:fraigodrichard@gmail.com" class="btn primary">
            Get In Touch
        </a>

    </div>

</section>

@endsection