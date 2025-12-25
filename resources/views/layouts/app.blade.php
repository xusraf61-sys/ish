<!DOCTYPE html>
<html lang="uz">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Job Portal</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css">

    <style>
        body {
            background: #f1f5f9;
            font-family: 'Inter', sans-serif;
            min-height: 100vh;
        }
        .navbar {
            background: linear-gradient(135deg, #6366f1, #4f46e5);
            box-shadow: 0 4px 20px rgba(99, 102, 241, 0.2);
        }
        .navbar-brand {
            font-weight: 700;
            font-size: 1.6rem;
        }
        .card {
            transition: all 0.3s ease;
        }
        .card:hover {
            transform: translateY(-8px);
            box-shadow: 0 20px 40px rgba(0,0,0,0.08);
        }
        .btn-primary {
            background: #6366f1;
            border: none;
        }
        .btn-primary:hover {
            background: #4f46e5;
        }
        .btn-success {
            background: #10b981;
            border: none;
        }
        .btn-success:hover {
            background: #059669;
        }
    </style>
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-dark">
    <div class="container">
        <a class="navbar-brand" href="{{ route('jobs.index') }}">💼 JOB PORTAL</a>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto align-items-center">
                @auth
                    <li class="nav-item"><a class="nav-link" href="{{ route('jobs.index') }}">🔍 Ish izlash</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('messages.index') }}">💬 Chat</a></li>

                    @if(auth()->user()->role === 'employer')
                        <li class="nav-item"><a class="nav-link" href="{{ route('jobs.create') }}">➕ Ish joylash</a></li>
                    @endif

                    <li class="nav-item ms-3">
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button class="btn btn-outline-light btn-sm">Chiqish</button>
                        </form>
                    </li>
                @else
                    <li class="nav-item"><a class="nav-link" href="{{ route('login') }}">Kirish</a></li>
                    <li class="nav-item"><a class="btn btn-warning btn-sm ms-2" href="{{ route('register') }}">Ro'yxatdan o'tish</a></li>
                @endauth
            </ul>
        </div>
    </div>
</nav>

<main class="flex-grow-1">
    @yield('content')
</main>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>