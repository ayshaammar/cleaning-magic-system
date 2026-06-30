<!doctype html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ $title ?? 'Clinic Booking' }}</title>

    <!-- Bootstrap RTL -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.rtl.min.css" rel="stylesheet">
    <!-- Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" rel="stylesheet">

    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
</head>
<body class="bg-soft">

<nav class="navbar navbar-expand-lg glass-nav py-3">
    <div class="container">
        <a class="navbar-brand fw-bold d-flex align-items-center gap-2" href="{{ route('home') }}">
            <span class="brand-dot"></span>
            <span>Nova Clinic</span>
        </a>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#nav">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div id="nav" class="collapse navbar-collapse">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0 gap-lg-2">
                <li class="nav-item"><a class="nav-link" href="{{ route('home') }}">الرئيسية</a></li>

                @auth
                    <li class="nav-item"><a class="nav-link" href="{{ route('dashboard') }}">لوحة التحكم</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('notifications.index') }}">الرسائل</a></li>

                    @if(auth()->user()->isAdmin())
                        <li class="nav-item"><a class="nav-link" href="{{ route('admin.appointments.index') }}">لوحة الطبيب</a></li>
                    @endif
                @endauth
            </ul>

            <div class="d-flex gap-2">
                @guest
                    <a class="btn btn-outline-dark rounded-pill px-3" href="{{ route('login') }}">
                        <i class="bi bi-box-arrow-in-left ms-1"></i>تسجيل دخول
                    </a>
                    <a class="btn btn-primary rounded-pill px-3" href="{{ route('register') }}">
                        <i class="bi bi-person-plus ms-1"></i>إنشاء حساب
                    </a>
                @endguest

                @auth
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button class="btn btn-dark rounded-pill px-3" type="submit">
                            <i class="bi bi-door-open ms-1"></i>خروج
                        </button>
                    </form>
                @endauth
            </div>
        </div>
    </div>
</nav>

<main class="py-4">
    <div class="container">
        @if(session('success'))
            <div class="alert alert-success soft-shadow border-0">{{ session('success') }}</div>
        @endif
        @if(session('error'))
            <div class="alert alert-danger soft-shadow border-0">{{ session('error') }}</div>
        @endif

        @yield('content')
    </div>
</main>

<footer class="py-4 mt-5">
    <div class="container text-center text-muted small">
        © {{ date('Y') }} Nova Clinic — حجز واستشارات بطريقة أنيقة
    </div>
</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<script src="{{ asset('assets/js/app.js') }}"></script>
</body>
</html>
