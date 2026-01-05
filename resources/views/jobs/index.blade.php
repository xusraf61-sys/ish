@extends('layouts.app')

@section('content')

<!-- Hero Section -->
<div class="bg-light py-5" style="background: #f1f5f9;">
    <div class="container">
        <div class="text-center mb-5">
            <h1 class="display-4 fw-bold text-dark mb-4">💼 ISH TOPING</h1>
            <p class="lead text-muted mb-5">Loyhada eng ko'p joylangan ish o'rinlari</p>

            <!-- Search Bar -->
            <!-- Search Bar (yangilangan: search qiymati saqlanib qoladi va title parametrlari to'g'ri ishlaydi) -->
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

            <!-- Mashhur kategoriyalar -->
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

<!-- Ish o‘rinlari -->
<div class="container my-5">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h3 class="fw-bold">💼 Mavjud ish o‘rinlari</h3>
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
                    <div class="card border-0 shadow-sm rounded-4 h-100">
                        <div class="card-body p-4 d-flex flex-column">
                            <h5 class="fw-bold mb-3">{{ $job->title }}</h5>

                            <p class="text-muted mb-1">📍 {{ $job->location }}</p>
                            <p class="text-success fw-bold fs-4">💰 {{ $job->salary }}</p>
                            <p class="text-muted">⏰ {{ $job->work_time }}</p>
                            <p class="text-muted small">
                                Egasi: {{ $job->employer->name ?? 'Nomaʼlum' }}
                            </p>

                            <a href="{{ route('jobs.show', $job) }}"
                               class="btn btn-outline-primary rounded-pill mt-auto">
                                Batafsil ko‘rish
                            </a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    @else
        <p class="text-center fs-4 text-muted">Hozircha ishlar mavjud emas 😔</p>
    @endif
</div>

<!-- Footer -->
<footer class="pt-5 pb-4" style="background:#0f172a;">
    <div class="container">
        <div class="row gy-4">
            <div class="col-md-4">
                <h4 class="text-white fw-bold">💼 IshTop</h4>
                <p class="text-light opacity-75">
                    Eng qulay va ishonchli ish topish platformasi.
                </p>
            </div>

            <div class="col-md-4">
                <h5 class="text-white">Havolalar</h5>
                <ul class="list-unstyled">
                    <li><a href="{{ route('jobs.index') }}" class="text-light text-decoration-none opacity-75">🔍 Ishlar</a></li>
                    @auth
                    <li><a href="{{ route('jobs.create') }}" class="text-light text-decoration-none opacity-75">➕ Ish joylash</a></li>
                    @endauth
                </ul>
            </div>

            <div class="col-md-4">
                <h5 class="text-white">Aloqa</h5>
                <p class="text-light opacity-75">📍 Toshkent</p>
                <p class="text-light opacity-75">📞 +998 90 123 45 67</p>
                <p class="text-light opacity-75">✉️ info@ishtop.uz</p>
            </div>
        </div>

        <hr class="border-secondary mt-4">

        <p class="text-center text-light opacity-75 mb-0">
            © {{ date('Y') }} IshTop. Barcha huquqlar himoyalangan.
        </p>
    </div>
</footer>

<!-- Styles -->
<style>
    .card:hover {
        transform: translateY(-8px);
        transition: 0.3s;
        box-shadow: 0 20px 40px rgba(0,0,0,0.1);
    }
    .badge:hover {
        background: #6366f1 !important;
        color: #fff !important;
    }
</style>

@endsection
