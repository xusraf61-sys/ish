@extends('layouts.app')

@section('content')
<!-- Hero Section -->
<div class="bg-light py-5" style="background: #f1f5f9;">
    <div class="container">
        <div class="text-center mb-5">
            <h1 class="display-4 fw-bold text-dark mb-4">💼 ISH TOPING</h1>
            <p class="lead text-muted mb-5">Loyhada eng ko'p joylangan ish o'rinlari</p>

            <!-- Search Bar -->
            <form action="{{ route('jobs.index') }}" method="GET" class="col-lg-8 mx-auto">
                <div class="input-group input-group-lg shadow-sm rounded-pill overflow-hidden">
                    <input type="text" name="search" class="form-control border-0 ps-4" 
                           placeholder="Lavozim yoki kalit so'z kiriting..." 
                           value="{{ request('search') }}">
                    <button class="btn btn-primary px-5 rounded-pill">
                        🔍 Qidirish
                    </button>
                </div>
            </form>

            <!-- Mashhur kategoriyalar (loyhada eng ko'p create qilingan lavozimlar bo'yicha) -->
            <div class="mt-5">
                <p class="text-muted mb-3 fw-semibold">Eng ko'p joylangan lavozimlar:</p>
                <div class="d-flex flex-wrap justify-content-center gap-3">
                    <a href="?title=sotuv-menejeri" class="badge bg-light text-dark border rounded-pill px-4 py-3 fs-6 shadow-sm">💼 Sotuv menejeri</a>
                    <a href="?title=direktor" class="badge bg-light text-dark border rounded-pill px-4 py-3 fs-6 shadow-sm">👔 Direktor</a>
                    <a href="?title=it-mutaxassis" class="badge bg-light text-dark border rounded-pill px-4 py-3 fs-6 shadow-sm">💻 IT mutaxassisi</a>
                    <a href="?title=marketing" class="badge bg-light text-dark border rounded-pill px-4 py-3 fs-6 shadow-sm">📈 Marketing / SMM</a>
                    <a href="?title=kassir" class="badge bg-light text-dark border rounded-pill px-4 py-3 fs-6 shadow-sm">🛒 Kassir</a>
                    <a href="?title=haydovchi" class="badge bg-light text-dark border rounded-pill px-4 py-3 fs-6 shadow-sm">🚗 Haydovchi</a>
                    <a href="?title=buxgalter" class="badge bg-light text-dark border rounded-pill px-4 py-3 fs-6 shadow-sm">📊 Buxgalter</a>
                    <a href="?title=designer" class="badge bg-light text-dark border rounded-pill px-4 py-3 fs-6 shadow-sm">🖌️ Designer</a>
                    <a href="?title=mijoz-xizmat" class="badge bg-light text-dark border rounded-pill px-4 py-3 fs-6 shadow-sm">🤝 Mijozlarga xizmat</a>
                    <a href="?title=ishchi" class="badge bg-light text-dark border rounded-pill px-4 py-3 fs-6 shadow-sm">🏗️ Ishchi</a>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Mavjud ish o'rinlari (eng ko'p joylangan yuqorida) -->
<div class="container my-5">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h3 class="fw-bold">💼 Mavjud ish o‘rinlari (eng ko'p joylangan yuqorida)</h3>
        @auth
            <a href="{{ route('jobs.create') }}" class="btn btn-primary btn-lg shadow">
                ➕ Yangi ish joylash
            </a>
        @endauth
    </div>

    @if($jobs->count() > 0)
        <div class="row g-4">
            @foreach($jobs as $job)
                <div class="col-md-6 col-lg-4">
                    <div class="card border-0 shadow-sm rounded-4 overflow-hidden h-100" style="background: #f8f9fa;">
                        <div class="card-body p-4 d-flex flex-column justify-content-between">
                            <h5 class="card-title fw-bold text-dark mb-4">{{ $job->title }}</h5>

                            <div class="mb-4">
                                <p class="text-muted mb-2">
                                    📍 {{ $job->location }}
                                </p>
                                <p class="text-success fw-bold fs-4 mb-3">
                                    💰 {{ $job->salary }}
                                </p>
                                <p class="text-muted mb-2">
                                    ⏰ {{ $job->work_time }}
                                </p>
                                <p class="text-muted small">
                                    Egasi: {{ $job->employer->name ?? 'Noma\'lum' }}
                                </p>
                            </div>

                            <a href="{{ route('jobs.show', $job) }}" 
                               class="btn btn-outline-primary rounded-pill py-3 mt-auto shadow-sm">
                                Batafsil ko'rish
                            </a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    @else
        <div class="text-center py-5">
            <p class="fs-4 text-muted">Hozircha ishlar mavjud emas 😔</p>
        </div>
    @endif
</div>

<style>
    .card:hover {
        transform: translateY(-10px);
        box-shadow: 0 20px 40px rgba(0,0,0,0.1) !important;
        transition: all 0.3s ease;
    }
    .badge:hover {
        background: #6366f1 !important;
        color: white !important;
        transition: 0.3s;
    }
</style>
@endsection