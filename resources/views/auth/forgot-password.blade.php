<!DOCTYPE html>
<html lang="sw">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Semia Password - Portfolio System</title>
    
    <!-- Bootstrap 5 & FontAwesome Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    
    <style>
        :root {
            --gmail-blue: #1a73e8;
            --gmail-green: #34a853;
            --bg-light: #f8f9fa;
        }

        body {
            background-color: var(--bg-light);
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 20px;
        }

        .forgot-card {
            background: #ffffff;
            border: 1px solid #dadce0;
            border-radius: 12px;
            box-shadow: 0 4px 12px rgba(60,64,67,0.15);
            width: 100%;
            max-width: 420px;
            overflow: hidden;
            border-top: 5px solid var(--gmail-blue) !important;
        }

        .form-control:focus {
            border-color: var(--gmail-blue);
            box-shadow: 0 0 0 0.25rem rgba(26, 115, 232, 0.15);
        }

        .btn-gmail-blue {
            background-color: var(--gmail-blue);
            color: #ffffff;
            border: none;
            padding: 10px;
            font-weight: 600;
            border-radius: 6px;
            transition: all 0.2s;
        }

        .btn-gmail-blue:hover {
            background-color: #1557b0;
            color: #ffffff;
        }
    </style>
</head>
<body>

    <div class="forgot-card p-4 p-sm-5">
        
        <!-- HEADER LOGO / TITLE -->
        <div class="text-center mb-4">
            <div class="mb-2">
                <i class="fa-solid fa-key text-warning fs-1"></i>
            </div>
            <h4 class="fw-bold text-dark m-0">Umesahau Password?</h4>
            <p class="text-muted small mt-2">
                Ingiza email yako hapa chini nasi tutakutumia link ya kurejesha na kutengeneza password mpya.
            </p>
        </div>

        <!-- SESSION STATUS ALERT -->
        @if (session('status'))
            <div class="alert alert-success border-0 small py-2 mb-3 shadow-sm" role="alert">
                <i class="fa-solid fa-circle-check me-1"></i> {{ session('status') }}
            </div>
        @endif

        <!-- FORGOT PASSWORD FORM -->
        <form method="POST" action="{{ route('password.email') }}">
            @csrf

            <!-- EMAIL ADDRESS -->
            <div class="mb-4">
                <label for="email" class="form-label fw-semibold text-dark small">
                    <i class="fa-regular fa-envelope me-1 text-muted"></i> Email Address
                </label>
                <input type="email" 
                       id="email" 
                       name="email" 
                       class="form-control @error('email') is-invalid @enderror" 
                       value="{{ old('email') }}" 
                       placeholder="mfano@admin.com" 
                       required 
                       autofocus>
                
                @error('email')
                    <div class="invalid-feedback small">{{ $message }}</div>
                @enderror
            </div>

            <!-- SUBMIT BUTTON -->
            <button type="submit" class="btn btn-gmail-blue w-100 shadow-sm">
                <i class="fa-paper-plane fa-solid me-1"></i> Tuma Link ya Password
            </button>

            <!-- RETURN LINKS -->
            <div class="text-center mt-4 border-top pt-3 d-flex justify-content-between align-items-center">
                <a href="{{ route('login') }}" class="small text-primary text-decoration-none fw-semibold">
                    <i class="fa-solid fa-arrow-left me-1"></i> Rudi Log In
                </a>
                <a href="{{ url('/') }}" class="small text-muted text-decoration-none">
                    Website
                </a>
            </div>

        </form>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>