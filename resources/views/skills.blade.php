@extends('layouts.app')

@section('title', 'Skills')

@section('content')

<section class="section">

    <div class="container">

        <h1>My Skills</h1>

        <p>
            Technologies and tools I use to build software solutions.
        </p>

        <div class="skills-grid">

            @foreach ($skills as $skill)

                <span>{{ $skill }}</span>

            @endforeach

        </div>

    </div>

</section>

@endsection