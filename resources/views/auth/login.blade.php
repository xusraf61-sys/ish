@extends('layouts.app')

@section('content')
<div class="container vh-100 d-flex align-items-center justify-content-center" style="background: linear-gradient( #c7d2fe);">
    <div class="row justify-content-center w-100">
        <div class="col-md-8 col-lg-6 col-xl-5">
            <div class="card shadow-2xl border-0 rounded-4 overflow-hidden" style="backdrop-filter: blur(10px); background: rgba(255,255,255,0.85);">
                <div class="card-body p-5 text-center">
                    <!-- Job Portal Logo (indigo minimal briefcase) -->
                    <div class="mb-5">
                        <svg width="100" height="100" viewBox="0 0 100 100" xmlns="http://www.w3.org/2000/svg">
                            <defs>
                                <linearGradient id="grad" x1="0%" y1="0%" x2="100%" y2="100%">
                                    <stop offset="0%" style="stop-color:#6366f1;" />
                                    <stop offset="100%" style="stop-color:#4f46e5;" />
                                </linearGradient>
                            </defs>
                            <rect x="20" y="30" width="60" height="50" rx="10" fill="url(#grad)" />
                            <rect x="30" y="40" width="40" height="10" rx="5" fill="white" opacity="0.8" />
                            <circle cx="50" cy="65" r="8" fill="white" opacity="0.6" />
                        </svg>
                        <h3 class="fw-bold mt-3 text-indigo">JOB PORTAL</h3>
                    </div>

                    <h4 class="fw-bold mb-5 text-dark">Tizimga kirish</h4>

                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="mb-4 text-start">
                            <label class="form-label fw-semibold text-muted">Email</label>
                            <input type="email" name="email" class="form-control form-control-lg rounded-pill shadow-sm" 
                                   value="{{ old('email') }}" required autofocus>
                        </div>

                        <div class="mb-4 text-start">
                            <label class="form-label fw-semibold text-muted">Parol</label>
                            <input type="password" name="password" class="form-control form-control-lg rounded-pill shadow-sm" required>
                        </div>

                        <div class="mb-4 form-check text-start">
                            <input type="checkbox" name="remember" id="remember" class="form-check-input">
                            <label class="form-check-label text-muted" for="remember">Eslab qolish</label>
                        </div>

                        <button type="submit" class="btn btn-lg w-100 rounded-pill shadow-lg text-white fw-bold"
                                style="background: linear-gradient(135deg, #6366f1, #4f46e5); height: 55px;">
                            KIRISH
                        </button>

                        <div class="mt-4 text-muted small">
                            @if (Route::has('password.request'))
                                <a href="{{ route('password.request') }}" class="d-block mb-2 text-primary fw-bold">Parolni unutdingizmi?</a>
                            @endif
                            Ro'yxatdan o'tmaganmisiz? <a href="{{ route('register') }}" class="text-primary fw-bold">Ro'yxatdan o'tish</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection