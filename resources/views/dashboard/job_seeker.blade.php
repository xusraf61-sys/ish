@extends('layouts.app')

@section('content')
<div class="container py-5">
    <h3 class="dashboard-title">🎓 Job Seeker Dashboard</h3>

    <div class="row justify-content-center mb-5">
        <div class="col-md-4">
            <div class="dashboard-card text-center">
                <div class="dashboard-icon">💼</div>
                <h5 class="fw-semibold">Ishlarni ko‘rish</h5>
                <p class="text-muted mt-2">
                    Mavjud ish e’lonlarini ko‘rib chiqing
                </p>
                <a href="{{ route('jobs.index') }}" class="btn btn-success mt-3">
                    Ishlar
                </a>
            </div>
        </div>
    </div>
</div>

<!-- Footer -->
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
