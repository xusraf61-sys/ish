@extends('layouts.app')

@section('content')
<!-- Hero Header (Dribbble uslubi) -->
<div class="bg-light py-5" style="background: #f1f5f9;">
    <div class="container">
        <div class="text-center">
            <h1 class="display-5 fw-bold text-dark">{{ $job->title }}</h1>
            <p class="lead text-muted mt-3">
                {{ $job->employer->name ?? 'Noma\'lum kompaniya' }} tomonidan joylashtirilgan
            </p>
        </div>
    </div>
</div>

<div class="container my-5">
    <div class="row justify-content-center">
        <div class="col-lg-10 col-xl-8">
            <div class="card shadow-lg border-0 rounded-4 overflow-hidden">
                <div class="card-body p-5">
                    <!-- Job Info Grid -->
                    <div class="row g-4 mb-5">
                        <div class="col-md-6">
                            <div class="d-flex align-items-center mb-3">
                                <div class="bg-light rounded-pill p-3 me-3">
                                    <i class="bi bi-geo-alt text-primary fs-4"></i>
                                </div>
                                <div>
                                    <small class="text-muted">Joylashuv</small>
                                    <p class="fw-semibold mb-0">{{ $job->location }}</p>
                                </div>
                            </div>

                            <div class="d-flex align-items-center mb-3">
                                <div class="bg-light rounded-pill p-3 me-3">
                                    <i class="bi bi-clock text-primary fs-4"></i>
                                </div>
                                <div>
                                    <small class="text-muted">Ish vaqti</small>
                                    <p class="fw-semibold mb-0">{{ $job->work_time }}</p>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="d-flex align-items-center mb-3">
                                <div class="bg-light rounded-pill p-3 me-3">
                                    <i class="bi bi-currency-dollar text-success fs-4"></i>
                                </div>
                                <div>
                                    <small class="text-muted">Maosh</small>
                                    <p class="fw-bold text-success fs-3 mb-0">{{ $job->salary }}</p>
                                </div>
                            </div>

                            <div class="text-md-end">
                                <small class="text-muted">
                                    Joylashtirilgan: {{ $job->created_at->diffForHumans() }}
                                </small>
                            </div>
                        </div>
                    </div>

                    <hr class="my-5">

                    <!-- Tavsif -->
                    <h4 class="fw-bold mb-4">Ish tavsifi</h4>
                    <div class="lead text-muted lh-lg">
                        {!! nl2br(e($job->description)) !!}
                    </div>

                    <hr class="my-5">

                    <!-- Action Buttons -->
                    <div class="text-center">
                        @auth
                            @if(Auth::id() === $job->user_id)
                                <div class="alert alert-info rounded-pill py-3 shadow-sm" 
                                     style="background-color: #cff4fc; color: #055160;">
                                    <strong>Bu sizning ishingiz – ariza yoki suhbat boshlay olmaysiz.</strong>
                                </div>
                            @else
                                @php
                                    $alreadyApplied = $job->applications()->where('user_id', Auth::id())->exists();
                                @endphp

                                <div class="d-flex flex-column flex-md-row gap-4 justify-content-center">
                                    @if(!$alreadyApplied)
                                        <form action="{{ route('applications.store', $job) }}" method="POST">
                                            @csrf
                                            <button type="submit" class="btn btn-success btn-lg px-5 shadow rounded-pill">
                                                Ariza topshirish
                                            </button>
                                        </form>
                                    @endif

                                    <a href="{{ route('messages.show', $job->user_id) }}" 
                                       class="btn btn-primary btn-lg px-5 shadow rounded-pill">
                                        💬 Ish egasi bilan suhbatlashish
                                    </a>
                                </div>

                                @if($alreadyApplied)
                                    <div class="alert alert-success rounded-pill mt-4 py-3 shadow-sm">
                                        Siz allaqachon ariza topshirgansiz! Javob kutilyapti.
                                    </div>
                                @endif
                            @endif
                        @else
                            <div class="alert alert-warning rounded-pill py-3 shadow-sm">
                                Amalni bajarish uchun <a href="{{ route('login') }}">tizimga kirishingiz</a> kerak.
                            </div>
                        @endauth
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<footer class="pt-5 pb-4 mt-auto" style="background:#0f172a;">
    <div class="container">
        <div class="row gy-4 text-center text-md-start">

            <!-- Logo -->
            <div class="col-md-4">
                <h4 class="text-white fw-bold">💼 Job Portal</h4>
                <p class="text-light opacity-75">
                    Ish topish va ish joylash uchun zamonaviy platforma.
                </p>
            </div>

            <!-- Links -->
            <div class="col-md-4">
                <h5 class="text-white fw-semibold">Foydali havolalar</h5>
                <ul class="list-unstyled">
                    <li class="mb-2">
                        <a href="{{ route('jobs.index') }}" class="text-light text-decoration-none opacity-75">
                            🔍 Ishlar
                        </a>
                    </li>
                    <li class="mb-2">
                        <a href="{{ route('messages.index') }}" class="text-light text-decoration-none opacity-75">
                            💬 Chat
                        </a>
                    </li>
                </ul>
            </div>

            <!-- Contact -->
            <div class="col-md-4">
                <h5 class="text-white fw-semibold">Aloqa</h5>
                <p class="text-light opacity-75 mb-1">📍 Toshkent, O‘zbekiston</p>
                <p class="text-light opacity-75 mb-1">📞 +998 90 123 45 67</p>
                <p class="text-light opacity-75">✉️ info@jobportal.uz</p>
            </div>
        </div>

        <hr class="border-secondary my-4">

        <p class="text-center text-light opacity-75 mb-0">
            © {{ date('Y') }} Job Portal. Barcha huquqlar himoyalangan.
        </p>
    </div>
</footer>
@endsection