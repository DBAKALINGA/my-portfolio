<!DOCTYPE html>
<html lang="sw">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Post Event Mpya - Admin Panel</title>
    
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

        /* FORM CARD STYLING */
        .form-card {
            background: #ffffff;
            border: 1px solid #dadce0;
            border-radius: 12px;
            box-shadow: 0 1px 3px rgba(60,64,67,0.08);
            border-top: 4px solid var(--gmail-red) !important;
        }

        .form-control:focus, .form-select:focus {
            border-color: var(--gmail-red);
            box-shadow: 0 0 0 0.25rem rgba(234, 67, 53, 0.15);
        }

        .btn-gmail-red {
            background-color: var(--gmail-red);
            color: #ffffff;
            border: none;
            padding: 10px 24px;
            font-weight: 600;
            border-radius: 6px;
        }

        .btn-gmail-red:hover {
            background-color: #d93025;
            color: #ffffff;
        }

        .image-preview-box {
            width: 100%;
            height: 180px;
            border: 2px dashed #dadce0;
            border-radius: 8px;
            display: flex;
            align-items: center;
            justify-content: center;
            background-color: #f8f9fa;
            overflow: hidden;
            position: relative;
        }

        .image-preview-box img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            display: none;
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
                    <i class="fa-solid fa-calendar-plus text-danger me-2"></i>Post Event Mpya
                </h4>
                <small class="text-muted">Jaza taarifa hapa chini ili kuongeza tukio au mafunzo mapya</small>
            </div>
            <div>
                <a href="{{ route('admin.events.index') }}" class="btn btn-outline-secondary btn-sm px-3">
                    <i class="fa-solid fa-arrow-left me-1"></i> Rudi Kwenye Orodha
                </a>
            </div>
        </header>

        <!-- ERROR ALERTS -->
        @if ($errors->any())
            <div class="alert alert-danger border-0 mb-4 shadow-sm">
                <ul class="m-0 ps-3">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <!-- FORM CARD -->
        <div class="row justify-content-center">
            <div class="col-lg-9">
                <div class="card form-card p-4">
                    <form action="{{ route('admin.events.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <div class="row g-3">
                            <!-- Title Input -->
                            <div class="col-md-7">
                                <label class="form-label fw-bold text-dark">
                                    <i class="fa-solid fa-heading me-1 text-muted"></i> Kichwa cha Tukio (Title) <span class="text-danger">*</span>
                                </label>
                                <input type="text" name="title" class="form-control form-control-lg fs-6" placeholder="Mfano: Mafunzo ya Web Development" value="{{ old('title') }}" required>
                            </div>

                            <!-- Date Input -->
                            <div class="col-md-5">
                                <label class="form-label fw-bold text-dark">
                                    <i class="fa-regular fa-calendar me-1 text-muted"></i> Tarehe ya Tukio
                                </label>
                                <input type="date" name="event_date" class="form-control form-control-lg fs-6" value="{{ old('event_date') }}">
                            </div>

                            <!-- Description Input -->
                            <div class="col-12">
                                <label class="form-label fw-bold text-dark">
                                    <i class="fa-solid fa-align-left me-1 text-muted"></i> Maelezo ya Tukio (Description) <span class="text-danger">*</span>
                                </label>
                                <textarea name="description" rows="5" class="form-control" placeholder="Andika maelezo kwa kina kuhusu tukio hili..." required>{{ old('description') }}</textarea>
                            </div>

                            <!-- Image Upload & Live Preview -->
                            <div class="col-12">
                                <label class="form-label fw-bold text-dark">
                                    <i class="fa-solid fa-image me-1 text-muted"></i> Picha ya Tukio <span class="text-muted fw-normal">(Hiari)</span>
                                </label>
                                <div class="row align-items-center">
                                    <div class="col-md-8">
                                        <input type="file" name="image" id="eventImageInput" class="form-control mb-5" accept="image/*" onchange="previewImage(event)">
                                        <small class="text-muted d-block">Aina za picha zinazokubalika: JPG, PNG, WEBP. Ukubwa usizidi 5MB.</small>
                                    </div>
                                    <div class="col-md-4 mt-2 mt-md-0">
                                        <div class="image-preview-box" id="previewContainer">
                                            <span class="text-muted small" id="previewPlaceholder"><i class="fa-regular fa-image me-1"></i> Preview itaonekana hapa</span>
                                            <img id="imagePreview" src="#" alt="Image Preview">
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Action Buttons -->
                            <div class="col-12 border-top pt-3 mt-4 d-flex justify-content-end gap-2">
                                <a href="{{ route('admin.events.index') }}" class="btn btn-light border px-4">Ghairi</a>
                                <button type="submit" class="btn btn-gmail-red shadow-sm">
                                    <i class="fa-solid fa-paper-plane me-1"></i> Hifadhi na Post
                                </button>
                            </div>
                        </div>

                    </form>
                </div>
            </div>
        </div>

    </main>

    <!-- JavaScript For Image Preview & Bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        function previewImage(event) {
            const input = event.target;
            const preview = document.getElementById('imagePreview');
            const placeholder = document.getElementById('previewPlaceholder');

            if (input.files && input.files[0]) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    preview.src = e.target.result;
                    preview.style.display = 'block';
                    placeholder.style.display = 'none';
                }
                reader.readAsDataURL(input.files[0]);
            }
        }
    </script>
</body>
</html>