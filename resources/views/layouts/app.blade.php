<!DOCTYPE html>
<html lang="sw">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <title>@yield('title', 'My Portfolio') - Fraigod</title>

    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- FontAwesome Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <!-- Custom CSS (Style.css yako) -->
<link rel="stylesheet" href="{{ asset('css/style.css') }}?v={{ time() }}">

    <style>
        /* Mipangilio ya ziada kwa ajili ya Footer kuweka chini kabisa */
        body {
            display: flex;
            flex-direction: column;
            min-height: 100vh;
        }

        main {
            flex: 1;
        }

        footer {
            background-color: #0b1120;
            border-top: 1px solid #1e293b;
            color: #94a3b8;
            padding: 20px 0;
            text-align: center;
            font-size: 14px;
        }

        footer span {
            color: #38bdf8;
            font-weight: 600;
        }
    </style>
</head>
<body>

    <!-- NAVBAR HEADER -->
    <header>
        <nav class="navbar navbar-expand-lg">
            <div class="container">

                <!-- LOGO -->
                <a href="{{ route('home') }}" class="logo text-decoration-none">
                    Fraigod<span>.</span>
                </a>

                <!-- MOBILE TOGGLER BUTTON -->
                <button class="navbar-toggler border-0 text-white" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <i class="fa-solid fa-bars fs-3 text-info"></i>
                </button>

                <!-- NAV LINKS -->
                <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
                    <div class="nav-links mt-3 mt-lg-0">
                        <a href="{{ route('home') }}" class="{{ request()->routeIs('home') ? 'active' : '' }}">
                            <i class="fa-solid fa-house me-1"></i> Home
                        </a>
                        <a href="{{ route('about') }}" class="{{ request()->routeIs('about') ? 'active' : '' }}">
                            <i class="fa-solid fa-user me-1"></i> About
                        </a>
                        <a href="{{ route('skills') }}" class="{{ request()->routeIs('skills') ? 'active' : '' }}">
                            <i class="fa-solid fa-code me-1"></i> Skills
                        </a>
                        <a href="{{ route('projects') }}" class="{{ request()->routeIs('projects') ? 'active' : '' }}">
                            <i class="fa-solid fa-laptop-code me-1"></i> Projects
                        </a>
                        <a href="{{ route('contact.show') }}" class="{{ request()->routeIs('contact.show') ? 'active' : '' }}">
                            <i class="fa-solid fa-envelope me-1"></i> Contact
                        </a>
                    </div>
                </div>

            </div>
        </nav>
    </header>

    <!-- MAIN CONTENT AREA -->
    <main>
        @yield('content')
    </main>

    <!-- FOOTER -->
    <footer>
        <div class="container">
            <p class="m-0">&copy; {{ date('Y') }} <span>Fraigod</span>. All rights reserved.</p>
        </div>
    </footer>

    <!-- Bootstrap 5 JavaScript Bundle -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>