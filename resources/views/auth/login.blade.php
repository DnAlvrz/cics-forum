@extends('layouts.app')

@section('content')
<div id="main-content" class="d-flex flex-column align-items-center justify-content-center py-4" style="min-height: 70vh;">

    @if(session()->has('status'))
    <div class="w-100 alert alert-warning alert-dismissible fade show shadow-sm border-0 mb-4" style="max-width: 420px;" role="alert">
        <div class="d-flex align-items-center">
            <i class="fas fa-exclamation-triangle me-2 text-warning"></i>
            <div class="small fw-medium">{{ session('status') }}</div>
        </div>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif

    <div class="w-100 shadow-sm border rounded-3 bg-white" style="max-width: 420px;">
        <div class="p-4 p-sm-5">

            <div class="mb-4 text-center text-sm-start">
                <h3 class="fw-bold text-dark mb-1" style="letter-spacing: -0.5px;">Log in</h3>
                <p class="text-muted small">Welcome back to CICS Forum</p>
            </div>

            <form action="{{ route('login') }}" method="POST">
                @csrf

                <div class="mb-3">
                    <label for="email" class="form-label text-secondary small fw-bold">Email address</label>
                    <div class="input-group">
                        <span class="input-group-text bg-light border-end-0 text-muted">
                            <i class="fas fa-envelope fa-sm"></i>
                        </span>
                        <input type="email"
                               class="form-control border-start-0 ps-0 @error('email') is-invalid @enderror"
                               name="email"
                               id="email"
                               value="{{ old('email') }}"
                               placeholder="name@example.com"
                               required>
                    </div>
                    @error('email')
                    <p class="text-danger small mt-1 mb-0"><i class="fas fa-times-circle me-1"></i> Please enter your email</p>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="password" class="form-label text-secondary small fw-bold">Password</label>
                    <div class="input-group">
                        <span class="input-group-text bg-light border-end-0 text-muted">
                            <i class="fas fa-lock fa-sm"></i>
                        </span>
                        <input type="password"
                               class="form-control border-start-0 ps-0 @error('password') is-invalid @enderror"
                               name="password"
                               id="password"
                               placeholder="••••••••"
                               required>
                    </div>
                    @error('password')
                    <p class="text-danger small mt-1 mb-0"><i class="fas fa-times-circle me-1"></i> Please enter your password</p>
                    @enderror
                </div>

                <div class="d-flex justify-content-between align-items-center mb-4 pt-1">
                    <div class="form-check">
                        <input type="checkbox" class="form-check-input" name="remember" id="remember">
                        <label class="form-check-label text-muted small select-none" for="remember">
                            Remember me
                        </label>
                    </div>

                    @if (Route::has('password.request'))
                    <a href="{{ route('password.request') }}" class="text-decoration-none small fw-bold text-primary">
                        Forgot password?
                    </a>
                    @endif
                </div>

                <button type="submit" class="btn btn-primary w-100 py-2.5 fw-bold shadow-sm">
                    Log in <i class="fas fa-sign-in-alt ms-1"></i>
                </button>
            </form>

        </div>
    </div>
</div>
@endsection
