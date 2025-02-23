@extends('layouts.app')

@section('title', 'Register')

@section('content')
    <div class="d-flex align-items-center justify-content-center min-vh-100">
        <div class="register-container" style="max-width: 500px; width: 90%;">
            <div class="card shadow-sm">
                <div class="card-body p-4">
                    <h3 class="text-center mb-4">Register</h3>
                    <form method="POST" action="{{ route('register') }}">
                        @csrf
                        <div class="mb-3">
                            <label for="name" class="form-label">Full Name</label>
                            <input type="text" name="name" id="name" class="form-control" required autofocus>
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">Email Address</label>
                            <input type="email" name="email" id="email" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <label for="password" class="form-label">Password</label>
                            <div class="input-group">
                                <input type="password" name="password" id="password" class="form-control" required>
                                <button type="button" class="btn btn-outline-secondary" id="togglePassword">
                                    <i class="fas fa-eye"></i>
                                </button>
                            </div>
                        </div>
                        <div class="mb-4">
                            <label for="password_confirmation" class="form-label">Confirm Password</label>
                            <div class="input-group">
                                <input type="password" name="password_confirmation" id="password_confirmation"
                                    class="form-control" required>
                                <button type="button" class="btn btn-outline-secondary" id="togglePasswordConfirmation">
                                    <i class="fas fa-eye"></i>
                                </button>
                            </div>
                        </div>
                        <div class="d-grid gap-2">
                            <button type="submit" class="btn btn-primary">Register</button>
                        </div>
                    </form>
                    <p class="mt-3 text-center">Already have an account? <a href="{{ route('login') }}">Login here</a></p>
                </div>
            </div>
        </div>
    </div>

    <style>
        .register-container {
            animation: fadeIn 0.5s ease-in;
        }

        .card {
            border-radius: 10px;
            border: none;
            background-color: white;
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
                this.innerHTML = '<i class="fas fa-eye-slash"></i>';
            } else {
                passwordField.setAttribute('type', 'password');
                this.innerHTML = '<i class="fas fa-eye"></i>';
            }
        });

        document.getElementById('togglePasswordConfirmation').addEventListener('click', function () {
            const passwordField = document.getElementById('password_confirmation');
            const passwordFieldType = passwordField.getAttribute('type');
            if (passwordFieldType === 'password') {
                passwordField.setAttribute('type', 'text');
                this.innerHTML = '<i class="fas fa-eye-slash"></i>';
            } else {
                passwordField.setAttribute('type', 'password');
                this.innerHTML = '<i class="fas fa-eye"></i>';
            }
        });
    </script>
@endsection