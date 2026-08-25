<!DOCTYPE html>
<html lang="sw">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Orodha ya Matukio - Admin Panel</title>
    
    <!-- Bootstrap 5 & FontAwesome Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    
    <!-- Custom Modern Dashboard Styling -->
    <style>
        :root {
            --gmail-red: #ea4335;
            --gmail-blue: #1a73e8;
            --gmail-green: #34a853;
            --bg-light: #f8f9fa;
            --sidebar-width: 250px;
        }

        body {
            background-color: var(--bg-light);
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            overflow-x: hidden;
        }

        /* SIDEBAR STYLING */
        .sidebar {
            width: var(--sidebar-width);
            height: 100vh;
            position: fixed;
            top: 0;
            left: 0;
            background-color: #ffffff;
            border-right: 1px solid #e0e0e0;
            z-index: 1000;
        }

        .sidebar-brand {
            padding: 20px;
            font-size: 1.25rem;
            font-weight: 700;
            color: #202124;
            border-bottom: 1px solid #f1f3f4;
        }

        .sidebar-menu {
            list-style: none;
            padding: 15px 10px;
            margin: 0;
        }

        .sidebar-menu li { margin-bottom: 5px; }

        .sidebar-menu a {
            display: flex;
            align-items: center;
            padding: 12px 15px;
            color: #5f6368;
            text-decoration: none;
            border-radius: 8px;
            font-weight: 500;
            transition: all 0.2s;
        }

        .sidebar-menu a:hover, 
        .sidebar-menu a.active {
            background-color: #fce8e6;
            color: var(--gmail-red);
        }

        .sidebar-menu a i {
            margin-right: 12px;
            font-size: 1.1rem;
        }

        /* MAIN CONTENT AREA */
        .main-content {
            margin-left: var(--sidebar-width);
            padding: 30px;
            min-height: 100vh;
        }

        /* NAVBAR HEADER */
        .top-navbar {
            background-color: #ffffff;
            border-radius: 12px;
            padding: 15px 25px;
            border: 1px solid #dadce0;
            margin-bottom: 30px;
        }

        /* CARD & TABLE STYLING */
        .google-card {
            background: #ffffff;
            border: 1px solid #dadce0;
            border-radius: 12px;
            box-shadow: 0 1px 3px rgba(60,64,67,0.08);
            border-top: 4px solid var(--gmail-red) !important;
        }

        .btn-gmail-red {
            background-color: var(--gmail-red);
            color: #ffffff;
            border: none;
            padding: 8px 18px;
            font-weight: 600;
            border-radius: 6px;
        }

        .btn-gmail-red:hover {
            background-color: #d93025;
            color: #ffffff;
        }

        .event-img-thumbnail {
            width: 48px;
            height: 48px;
            object-fit: cover;
            border-radius: 8px;
            border: 1px solid #dadce0;
        }

        .event-img-placeholder {
            width: 48px;
            height: 48px;
            border-radius: 8px;
            background-color: #f1f3f4;
            display: flex;
            align-items: center;
            justify-content: center;
            color: #5f6368;
        }

        @media (max-width: 768px) {
            .sidebar { margin-left: calc(-1 * var(--sidebar-width)); }
            .main-content { margin-left: 0; padding: 15px; }
        }
    </style>
</head>
<body>

    <!-- 1. SIDEBAR NAVIGATION -->
    <aside class="sidebar">
        <div class="sidebar-brand d-flex align-items-center">
            <i class="fa-solid fa-square-poll-vertical text-danger me-2 fs-4"></i>
            <span>Admin Panel</span>
        </div>
        
        <ul class="sidebar-menu">
            <li>
                <a href="{{ route('admin.dashboard') }}">
                    <i class="fa-solid fa-house"></i>
                    <span>Dashboard</span>
                </a>
            </li>
            <li>
                <a href="{{ route('admin.projects.index') }}">
                    <i class="fa-solid fa-diagram-project text-primary"></i>
                    <span>Projects</span>
                </a>
            </li>
            <li>
                <a href="{{ route('admin.events.index') }}" class="active">
                    <i class="fa-solid fa-calendar-days text-danger"></i>
                    <span>Events</span>
                </a>
            </li>
            <li class="mt-4 border-top pt-3">
                <a href="{{ url('/') }}" target="_blank">
                    <i class="fa-solid fa-globe text-success"></i>
                    <span>View Website</span>
                </a>
            </li>
            <!-- LOGOUT BUTTON -->
<li class="mt-2 border-top pt-2">
    <form method="POST" action="{{ route('logout') }}" id="logout-form">
        @csrf
        <a href="{{ route('logout') }}" 
           class="text-danger" 
           onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
            <i class="fa-solid fa-right-from-bracket text-danger"></i>
            <span>(Logout)</span>
        </a>
    </form>
</li>
        </ul>
    </aside>

    <!-- 2. MAIN CONTENT AREA -->
    <main class="main-content">
        
        <!-- TOP NAVBAR HEADER -->
        <header class="top-navbar d-flex justify-content-between align-items-center">
            <div>
                <h4 class="fw-bold m-0 text-dark">
                    <i class="fa-solid fa-calendar-days text-danger me-2"></i>Usimamizi wa Matukio
                </h4>
                <small class="text-muted">Tazama au futa matukio na mafunzo yaliyopostiwa</small>
            </div>
            <div>
                <a href="{{ route('admin.events.create') }}" class="btn btn-gmail-red shadow-sm">
                    <i class="fa-solid fa-plus me-1"></i> Ongeza Tukio Mpya
                </a>
            </div>
        </header>

        <!-- SUCCESS ALERT -->
        @if(session('success'))
            <div class="alert alert-dismissible fade show border-0 text-white mb-4 shadow-sm" style="background-color: var(--gmail-green);" role="alert">
                <i class="fa-solid fa-circle-check me-2"></i>{{ session('success') }}
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="alert"></button>
            </div>
        @endif

        <!-- EVENTS TABLE CARD -->
        <div class="card google-card border-0">
            <div class="card-header bg-white py-3 d-flex justify-content-between align-items-center border-bottom">
                <h6 class="m-0 fw-bold text-dark">
                    <i class="fa-solid fa-list text-muted me-2"></i>Orodha ya Matukio
                </h6>
                <span class="badge bg-light text-dark fw-bold border px-3 py-2">
                    {{ count($events) }} {{ Str::plural('Tukio', count($events)) }}
                </span>
            </div>
            
            <div class="card-body p-0">
                <div class="table-responsive">
                    <table class="table table-hover align-middle mb-0">
                        <thead class="bg-light text-muted small text-uppercase">
                            <tr>
                                <th class="ps-4 py-3">Picha</th>
                                <th class="py-3">Kichwa (Title)</th>
                                <th class="py-3">Maelezo</th>
                                <th class="py-3">Tarehe ya Tukio</th>
                                <th class="text-end pe-4 py-3">Kitendo</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($events as $event)
                                <tr>
                                    <!-- Image Thumbnail -->
                                    <td class="ps-4">
                                        @if($event->image)
                                            <img src="{{ asset('storage/' . $event->image) }}" alt="{{ $event->title }}" class="event-img-thumbnail">
                                        @else
                                            <div class="event-img-placeholder">
                                                <i class="fa-regular fa-image"></i>
                                            </div>
                                        @endif
                                    </td>

                                    <!-- Title -->
                                    <td class="fw-bold text-dark">
                                        {{ $event->title }}
                                    </td>

                                    <!-- Description -->
                                    <td class="text-secondary">
                                        {{ Str::limit($event->description, 60) }}
                                    </td>

                                    <!-- Date -->
                                    <td>
                                        <span class="badge bg-light text-dark border">
                                            <i class="fa-regular fa-calendar-check me-1 text-danger"></i>
                                            {{ $event->event_date ?? 'Haijawekwa' }}
                                        </span>
                                    </td>

                                    <!-- Actions -->
                                    <td class="text-end pe-4">
                                        <form action="{{ route('admin.events.destroy', $event->id) }}" method="POST" class="d-inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-outline-danger border-0" onclick="return confirm('Una uhakika unataka kufuta tukio hili?')" title="Futa Tukio">
                                                <i class="fa-solid fa-trash-can"></i> Delete
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="5" class="text-center py-5 text-muted">
                                        <i class="fa-regular fa-calendar-xmark fa-3x mb-3 text-warning d-block"></i>
                                        Hakuna Tukio lolote lililopostiwa bado.
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </main>

    <!-- Bootstrap JS Bundle -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>