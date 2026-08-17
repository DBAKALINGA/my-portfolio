@extends('layouts.app')

@section('title', 'About Me')

@section('content')

<section class="about-hero">

    <div class="container">

        <p class="section-label">GET TO KNOW ME</p>

        <h1>About Me</h1>

        <p class="about-intro">
            {{ $description }}
        </p>

    </div>

</section>


<section class="section">

    <div class="container about-grid">

        <div class="about-card">

            <div class="profile-circle">
                FR
            </div>

        </div>


        <div class="about-content">

            <p class="section-label">
                WHO I AM
            </p>

            <h2>
                {{ $name }}
            </h2>

            <h3>
                {{ $role }}
            </h3>

            <p>
                I am passionate about technology and software development.
                My goal is to create reliable, scalable and user-friendly
                applications that solve real problems.
            </p>

            <p>
                I enjoy learning new technologies, working on challenging
                projects and continuously improving my programming and
                software engineering skills.
            </p>

        </div>

    </div>

</section>


<section class="section">

    <div class="container">

        <div class="section-heading">

            <p class="section-label">
                WHAT I LOVE
            </p>

            <h2>My Interests</h2>

        </div>


        <div class="interest-grid">

            @foreach ($interests as $interest)

                <div class="interest-card">

                    <h3>{{ $interest }}</h3>

                    <p>
                        Exploring and building practical solutions
                        using modern technologies.
                    </p>

                </div>

            @endforeach

        </div>

    </div>

</section>


<section class="section about-cta">

    <div class="container">

        <h2>Let's Build Something Great</h2>

        <p>
            I am always interested in learning, collaborating
            and working on meaningful technology projects.
        </p>

        <a href="#contact" class="btn primary">
            Get In Touch
        </a>

    </div>

</section>

@endsection