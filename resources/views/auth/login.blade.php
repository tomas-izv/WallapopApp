@extends('layouts.app')

@section('title', 'Login')

@section('content')
    <div class="d-flex align-items-center justify-content-center min-vh-100">
        <div class="login-container" style="max-width: 500px; width: 90%;">
            <div class="card shadow-sm">
                <div class="card-body p-4">
                    <h3 class="text-center mb-4">Login</h3>
                    <form method="POST" action="{{ route('login') }}">
                        @csrf
                        <div class="mb-3">
                            <label for="email" class="form-label">Email Address</label>
                            <input type="email" name="email" id="email" class="form-control" required autofocus>
                        </div>
                        <div class="mb-3">
                            <label for="password" class="form-label">Password</label>
                            <div class="input-group">
                                <input type="password" name="password" id="password" class="form-control" required>
                                <button type="button" class="btn btn-outline-secondary" id="togglePassword">
                                    <i class="fas fa-eye-slash"></i>
                                </button>
                            </div>
                        </div>
                        <div class="d-flex justify-content-between align-items-center mb-3">
                            <div class="form-check">
                                <input type="checkbox" name="remember" id="remember" class="form-check-input">
                                <label class="form-check-label" for="remember">Remember me</label>
                            </div>
                        </div>
                        <div class="d-grid gap-2">
                            <button type="submit" class="btn btn-primary">Login</button>
                        </div>
                    </form>
                    <p class="mt-3 text-center">Don't have an account? <a href="{{ route('register') }}">Register here</a>
                    </p>
                </div>
            </div>
        </div>
    </div>

    <style>
        .login-container {
            animation: fadeIn 0.5s ease-in;
        }

        .card {
            border-radius: 10px;
            border: none;
            background-color: white;
        }

        .btn-primary {
            background-color: var(--primary-color);
            border-color: var(--primary-color);
        }

        .btn-primary:hover {
            background-color: #128486;
            border-color: #128486;
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(-20px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
    </style>

@endsection

@section('scripts')
    <script>
        document.getElementById('togglePassword').addEventListener('click', function () {
            const passwordField = document.getElementById('password');
            const passwordFieldType = passwordField.getAttribute('type');
            if (passwordFieldType === 'password') {
                passwordField.setAttribute('type', 'text');
                this.innerHTML = '<i class="fas fa-eye"></i>';
            } else {
                passwordField.setAttribute('type', 'password');
                this.innerHTML = '<i class="fas fa-eye-slash"></i>';
            }
        });
    </script>
@endsection