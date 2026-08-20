<!DOCTYPE html>
<html lang="sw">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel - Portfolio</title>
    
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- FontAwesome Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    
    <!-- Custom Admin CSS -->
    <link rel="stylesheet" href="{{ asset('css/admin.css') }}">
</head>
<body>

<div class="container-fluid">
    <div class="row">
        <!-- SIDEBAR -->
        <div class="col-md-3 col-lg-2 sidebar p-3 d-none d-md-block">
            <h4 class="text-white text-center fw-bold my-3">
                <i class="fa-solid fa-user-shield me-2"></i>Admin Panel
            </h4>
            <hr class="text-secondary">
            
            <a href="{{ route('admin.dashboard') }}" class="active"><i class="fa-solid fa-gauge me-2"></i> Dashboard</a>
            <a href="{{ url('/') }}" target="_blank"><i class="fa-solid fa-globe me-2"></i> View Website</a>
            
            <div class="mt-5 pt-5">
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="btn btn-danger w-100 fw-bold">
                        <i class="fa-solid fa-right-from-bracket me-2"></i> Logout
                    </button>
                </form>
            </div>
        </div>

        <!-- MAIN CONTENT -->
        <div class="col-md-9 col-lg-10 main-content">
            <!-- TOPBAR -->
            <div class="topbar d-flex justify-content-between align-items-center">
                <div>
                    <h3 class="m-0 fw-bold text-dark">Dashboard</h3>
                    <small class="text-muted">Karibu tena, {{ auth()->user()->name }}</small>
                </div>
                <div>
                    <span class="badge bg-primary p-2"><i class="fa-solid fa-user me-1"></i> Admin Logged In</span>
                </div>
            </div>

            @yield('content')
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>