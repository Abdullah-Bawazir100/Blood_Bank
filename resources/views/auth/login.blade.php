@extends('layouts.auth')

@section('title', 'Login')

@section('content')

    <style>
        body::after {
            content: "";
            position: fixed;
            left: 0;
            bottom: 0;
            width: 100%;
            height: 180px; /* يمكنك تغيير الارتفاع حسب رغبتك */
            background: linear-gradient(to top, #dc3545, transparent);
            z-index: -1; /* حتى لا يغطي المحتوى */
        }
        /* Animation for card */
        @keyframes fadeSlideIn {
            0% {
                opacity: 0;
                transform: translateY(20px);
            }
            100% {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .login-card {
            animation: fadeSlideIn 0.6s ease-out;
            border-radius: 12px;
        }

        .form-control:focus {
            box-shadow: 0 0 8px rgba(220, 53, 69, 0.4);
            border-color: #dc3545;
        }

        .login-wrapper {
            min-height: 50vh;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        /* Logo styling */
        .logo-img {
            width: 100px;
            height: 100px;
            object-fit: contain;
            margin-bottom: 10px;
            border-bottom: 1px solid #dc3545;
        }
    </style>

    <div class="login-wrapper">
        <div class="card shadow-lg p-4 login-card" style="width: 100%; max-width: 360px;">

            <div class="text-center">
                <img src="/images/logo.jpg" alt="Blood Bank Logo" class="logo-img">
                <h3 class="mb-4 text-danger fw-bold">Blood Bank Login</h3>
            </div>

            <form method="POST" action="{{ route('login') }}" novalidate>
                @csrf

                <div class="mb-3">
                    <label for="email" class="form-label fw-semibold">Email</label>
                    <input type="email"
                           class="form-control @error('email') is-invalid @enderror"
                           id="email" name="email"
                           value="{{ old('email') }}" required autofocus>
                    @error('email')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="password" class="form-label fw-semibold">Password</label>
                    <input type="password"
                           class="form-control @error('password') is-invalid @enderror"
                           id="password" name="password"
                           required autocomplete="current-password">
                    @error('password')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <button type="submit" class="btn btn-danger w-100 mb-3 fw-semibold">Login</button>

                <div class="text-center">
                    <a href="{{ route('register') }}" class="text-decoration-none">
                        Don't have an account? <span class="fw-bold">Create Account</span>
                    </a>
                </div>
            </form>
        </div>
    </div>

@endsection
