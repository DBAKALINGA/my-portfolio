@extends('layouts.app')

@section('title', 'Skills')

@section('content')

<!-- HERO HEADER -->
<section class="skills-hero">
    <div class="container">
        <p class="section-label"><i class="fa-solid fa-code me-1"></i> EXPERTISE</p>
        <h1 class="fw-bold text-dark">My Skills</h1>
        <p>
            Technologies and tools I use to build modern software solutions.
        </p>
    </div>
</section>

<!-- SKILLS CARDS -->
<section class="section">
    <div class="container">
        <div class="skills-page-grid">
            @foreach ($skills as $skill)
                <div class="skill-card">
                    <i class="fa-solid fa-layer-group"></i>
                    <h3>{{ $skill }}</h3>
                </div>
            @endforeach
        </div>
    </div>
</section>

@endsection