<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>@yield('title') - My Portfolio</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body>

    <header>
        <nav class="navbar">

    <div class="container">

        <a href="{{ route('home') }}" class="logo">
            Fraigod<span>.</span>
        </a>

        <div class="nav-links">
            <a href="{{ route('home') }}">Home</a>
            <a href="{{ route('about') }}">About</a>
            <a href="{{ route('skills') }}">Skills</a>
            <a href="{{ route('projects') }}">Projects</a>
            <a href="{{ route('contact.show') }}">Contact</a>
        </div>

    </div>

</nav>
    </header>

    <main>
        @yield('content')
    </main>

    <footer>
        <p>&copy; {{ date('Y') }} My Portfolio. All rights reserved.</p>
    </footer>

</body>
</html>