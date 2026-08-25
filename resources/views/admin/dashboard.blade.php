<!DOCTYPE html>
<html lang="sw">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard - Portfolio</title>
    
    <!-- Bootstrap 5 & FontAwesome Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    
    <!-- Custom Modern Dashboard Styling -->
    <style>
        :root {
            --gmail-red: #ea4335;
            --gmail-blue: #1a73e8;
            --gmail-green: #34a853;
            --gmail-yellow: #fbbc04;
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
            transition: all 0.3s;
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

        .sidebar-menu li {
            margin-bottom: 5px;
        }

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
            background-color: #e8f0fe;
            color: var(--gmail-blue);
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

        /* GOOGLE DASHBOARD CARDS */
        .google-card {
            background: #ffffff;
            border: 1px solid #dadce0;
            border-radius: 12px;
            box-shadow: 0 1px 3px rgba(60,64,67,0.08);
            transition: all 0.25s ease-in-out;
        }

        .google-card:hover {
            box-shadow: 0 4px 12px rgba(60,64,67,0.15);
            transform: translateY(-2px);
        }

        .btn-gmail-blue {
            background-color: var(--gmail-blue);
            color: #ffffff;
            border: none;
        }

        .btn-gmail-blue:hover {
            background-color: #1557b0;
            color: #ffffff;
        }

        .btn-gmail-red {
            background-color: var(--gmail-red);
            color: #ffffff;
            border: none;
        }

        .btn-gmail-red:hover {
            background-color: #d93025;
            color: #ffffff;
        }

        /* RESPONSIVE DESIGN */
        @media (max-width: 768px) {
            .sidebar {
                margin-left: calc(-1 * var(--sidebar-width));
            }
            .main-content {
                margin-left: 0;
                padding: 15px;
            }
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
                <a href="{{ route('admin.dashboard') }}" class="active">
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
                <a href="{{ route('admin.events.index') }}">
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
        </ul>
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
    </aside>

    <!-- 2. MAIN CONTENT AREA -->
    <main class="main-content">
        
        <!-- TOP NAVBAR HEADER -->
        <header class="top-navbar d-flex justify-content-between align-items-center">
            <div>
                <h4 class="fw-bold m-0 text-dark">
                    <i class="fa-solid fa-gauge-high text-danger me-2"></i>Overview
                </h4>
                <small class="text-muted">Karibu kwenye Mfumo wako wa Usimamizi wa Portfolio</small>
            </div>
            <div>
                <span class="badge rounded-pill bg-light text-dark border px-3 py-2">
                    <i class="fa-solid fa-circle text-success me-1 small"></i> System Active
                </span>
            </div>
        </header>

        <!-- SUCCESS ALERT -->
        @if(session('success'))
            <div class="alert alert-dismissible fade show border-0 text-white mb-4" style="background-color: var(--gmail-green);" role="alert">
                <i class="fa-solid fa-circle-check me-2"></i>{{ session('success') }}
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="alert"></button>
            </div>
        @endif

        <!-- QUICK ACTION CARDS (PROJECTS & EVENTS) -->
        <div class="row g-4 mb-5">
            
            <!-- Projects Card -->
            <div class="col-md-6">
                <div class="card google-card border-0 h-100" style="border-top: 4px solid var(--gmail-blue) !important;">
                    <div class="card-body p-4 d-flex justify-content-between align-items-center">
                        <div>
                            <span class="badge bg-light text-primary mb-2 px-3 py-2 fw-semibold">
                                <i class="fa-solid fa-diagram-project me-1"></i> Projects Section
                            </span>
                            <h5 class="fw-bold text-dark m-0">Usimamizi wa Projects</h5>
                            <p class="text-muted small m-0 mt-1">Post au tazama kazi na mifumo uliyofanya.</p>
                        </div>
                        <div class="d-flex flex-column gap-2">
                            <a href="{{ route('admin.projects.create') }}" class="btn btn-gmail-blue btn-sm px-3 shadow-sm">
                                <i class="fa-solid fa-plus me-1"></i> Post Mpya
                            </a>
                            <a href="{{ route('admin.projects.index') }}" class="btn btn-outline-secondary btn-sm px-3">
                                <i class="fa-solid fa-list me-1"></i> Tazama Zote
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Events Card -->
            <div class="col-md-6">
                <div class="card google-card border-0 h-100" style="border-top: 4px solid var(--gmail-red) !important;">
                    <div class="card-body p-4 d-flex justify-content-between align-items-center">
                        <div>
                            <span class="badge bg-light text-danger mb-2 px-3 py-2 fw-semibold">
                                <i class="fa-solid fa-calendar-days me-1"></i> Events Section
                            </span>
                            <h5 class="fw-bold text-dark m-0">Usimamizi wa Events</h5>
                            <p class="text-muted small m-0 mt-1">Post matukio au mafunzo mapya.</p>
                        </div>
                        <div class="d-flex flex-column gap-2">
                            <a href="{{ route('admin.events.create') }}" class="btn btn-gmail-red btn-sm px-3 shadow-sm">
                                <i class="fa-solid fa-plus me-1"></i> Post Mpya
                            </a>
                            <a href="{{ route('admin.events.index') }}" class="btn btn-outline-secondary btn-sm px-3">
                                <i class="fa-solid fa-list me-1"></i> Tazama Zote
                            </a>
                        </div>
                    </div>
                </div>
            </div>

        </div>

        <!-- CONTACT MESSAGES TABLE SECTION -->
        <div class="card google-card border-0">
            <div class="card-header bg-white py-3 d-flex justify-content-between align-items-center border-bottom">
                <h5 class="m-0 fw-bold text-dark">
                    <i class="fa-solid fa-envelope text-danger me-2"></i>Jumbe Kutoka Contact Form
                </h5>
                <span class="badge bg-light text-dark fw-bold border px-3 py-2">
                    {{ count($messages) }} {{ Str::plural('Ujumbe', count($messages)) }}
                </span>
            </div>
            
            <div class="card-body p-0">
                <div class="table-responsive">
                    <table class="table table-hover align-middle mb-0">
                        <thead class="bg-light text-muted small text-uppercase">
                            <tr>
                                <th class="ps-4 py-3">Jina</th>
                                <th class="py-3">Email</th>
                                <th class="py-3">Ujumbe</th>
                                <th class="py-3">Tarehe</th>
                                <th class="text-end pe-4 py-3">Kitendo</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($messages as $msg)
                                <tr>
                                    <td class="ps-4 fw-bold text-dark">
                                        <i class="fa-regular fa-user me-2 text-primary"></i>{{ $msg->name }}
                                    </td>
                                    <td>
                                        <a href="mailto:{{ $msg->email }}" class="text-decoration-none text-muted">
                                            {{ $msg->email }}
                                        </a>
                                    </td>
                                    <td class="text-secondary">{{ Str::limit($msg->message, 80) }}</td>
                                    <td class="text-muted small">
                                        <i class="fa-regular fa-clock me-1"></i>{{ $msg->created_at->format('d/m/Y H:i') }}
                                    </td>
                                    <td class="text-end pe-4">
                                        <form action="{{ route('admin.messages.delete', $msg->id) }}" method="POST" class="d-inline">
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn btn-sm btn-outline-danger border-0" onclick="return confirm('Una uhakika unataka kufuta ujumbe huu?')" title="Futa Ujumbe">
                                                <i class="fa-solid fa-trash-can"></i> Futa
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="5" class="text-center py-5 text-muted">
                                        <i class="fa-regular fa-paper-plane fa-3x mb-3 text-warning d-block"></i>
                                        Hakuna ujumbe wowote uliotumwa kwa sasa.
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