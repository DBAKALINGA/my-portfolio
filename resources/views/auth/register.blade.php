<!DOCTYPE html>
<html lang="sw">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sajili Akaunti Mpya - Portfolio System</title>
    
    <!-- Bootstrap 5 & FontAwesome Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    
    <style>
        :root {
            --gmail-blue: #1a73e8;
            --gmail-red: #ea4335;
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

        .register-card {
            background: #ffffff;
            border: 1px solid #dadce0;
            border-radius: 12px;
            box-shadow: 0 4px 12px rgba(60,64,67,0.15);
            width: 100%;
            max-width: 450px;
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

        .password-toggle {
            cursor: pointer;
            background: transparent;
            border-left: none;
        }
    </style>
</head>
<body>

    <div class="register-card p-4 p-sm-5">
        
        <!-- HEADER LOGO / TITLE -->
        <div class="text-center mb-4">
            <div class="mb-2">
                <i class="fa-solid fa-user-plus text-primary fs-1"></i>
            </div>
            <h4 class="fw-bold text-dark m-0">Tengeneza Akaunti</h4>
            <small class="text-muted">Jaza taarifa zako kujisajili kwenye mfumo</small>
        </div>

        <!-- REGISTER FORM -->
        <form method="POST" action="{{ route('register') }}">
            @csrf

            <!-- NAME -->
            <div class="mb-3">
                <label for="name" class="form-label fw-semibold text-dark small">
                    <i class="fa-regular fa-user me-1 text-muted"></i> Jina Buche
                </label>
                <input type="text" 
                       id="name" 
                       name="name" 
                       class="form-control @error('name') is-invalid @enderror" 
                       value="{{ old('name') }}" 
                       placeholder="Ingiza jina lako" 
                       required 
                       autofocus>
                
                @error('name')
                    <div class="invalid-feedback small">{{ $message }}</div>
                @enderror
            </div>

            <!-- EMAIL ADDRESS -->
            <div class="mb-3">
                <label for="email" class="form-label fw-semibold text-dark small">
                    <i class="fa-regular fa-envelope me-1 text-muted"></i> Email Address
                </label>
                <input type="email" 
                       id="email" 
                       name="email" 
                       class="form-control @error('email') is-invalid @enderror" 
                       value="{{ old('email') }}" 
                       placeholder="mfano@admin.com" 
                       required>
                
                @error('email')
                    <div class="invalid-feedback small">{{ $message }}</div>
                @enderror
            </div>

            <!-- PASSWORD -->
            <div class="mb-3">
                <label for="password" class="form-label fw-semibold text-dark small">
                    <i class="fa-solid fa-lock me-1 text-muted"></i> Password
                </label>
                <div class="input-group">
                    <input type="password" 
                           id="password" 
                           name="password" 
                           class="form-control @error('password') is-invalid @enderror" 
                           placeholder="••••••••" 
                           required>
                    <button class="btn btn-outline-secondary password-toggle" type="button" onclick="togglePassword('password', 'toggleIcon1')">
                        <i class="fa-regular fa-eye" id="toggleIcon1"></i>
                    </button>
                </div>
                
                @error('password')
                    <div class="text-danger small mt-1">{{ $message }}</div>
                @enderror
            </div>

            <!-- CONFIRM PASSWORD -->
            <div class="mb-4">
                <label for="password_confirmation" class="form-label fw-semibold text-dark small">
                    <i class="fa-solid fa-shield-halved me-1 text-muted"></i> Thibitisha Password
                </label>
                <div class="input-group">
                    <input type="password" 
                           id="password_confirmation" 
                           name="password_confirmation" 
                           class="form-control @error('password_confirmation') is-invalid @enderror" 
                           placeholder="••••••••" 
                           required>
                    <button class="btn btn-outline-secondary password-toggle" type="button" onclick="togglePassword('password_confirmation', 'toggleIcon2')">
                        <i class="fa-regular fa-eye" id="toggleIcon2"></i>
                    </button>
                </div>
                
                @error('password_confirmation')
                    <div class="text-danger small mt-1">{{ $message }}</div>
                @enderror
            </div>

            <!-- SUBMIT BUTTON -->
            <button type="submit" class="btn btn-gmail-blue w-100 shadow-sm">
                <i class="fa-solid fa-user-check me-1"></i> Sajili Akaunti
            </button>

            <!-- LOGIN LINK -->
            <div class="text-center mt-4 border-top pt-3 d-flex justify-content-between align-items-center">
                <a href="{{ url('/') }}" class="small text-muted text-decoration-none">
                    <i class="fa-solid fa-arrow-left me-1"></i> Rudi Nyumbani
                </a>
                <a href="{{ route('login') }}" class="small text-primary text-decoration-none fw-semibold">
                    Tayari una akaunti? Log in
                </a>
            </div>

        </form>
    </div>

    <!-- Bootstrap JS & Toggle Script -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        function togglePassword(inputId, iconId) {
            const passwordInput = document.getElementById(inputId);
            const toggleIcon = document.getElementById(iconId);
            
            if (passwordInput.type === 'password') {
                passwordInput.type = 'text';
                toggleIcon.classList.remove('fa-eye');
                toggleIcon.classList.add('fa-eye-slash');
            } else {
                passwordInput.type = 'password';
                toggleIcon.classList.remove('fa-eye-slash');
                toggleIcon.classList.add('fa-eye');
            }
        }
    </script>
</body>
</html>