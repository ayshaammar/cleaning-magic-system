<!doctype html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?php echo e($title ?? 'Clinic Booking'); ?></title>

    <!-- Bootstrap RTL -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.rtl.min.css" rel="stylesheet">
    <!-- Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" rel="stylesheet">

    <link rel="stylesheet" href="<?php echo e(asset('assets/css/style.css')); ?>">
</head>
<body class="bg-soft">

<nav class="navbar navbar-expand-lg glass-nav py-3">
    <div class="container">
        <a class="navbar-brand fw-bold d-flex align-items-center gap-2" href="<?php echo e(route('home')); ?>">
            <span class="brand-dot"></span>
            <span>Nova Clinic</span>
        </a>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#nav">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div id="nav" class="collapse navbar-collapse">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0 gap-lg-2">
                <li class="nav-item"><a class="nav-link" href="<?php echo e(route('home')); ?>">الرئيسية</a></li>

                <?php if(auth()->guard()->check()): ?>
                    <li class="nav-item"><a class="nav-link" href="<?php echo e(route('dashboard')); ?>">لوحة التحكم</a></li>
                    <li class="nav-item"><a class="nav-link" href="<?php echo e(route('notifications.index')); ?>">الرسائل</a></li>

                    <?php if(auth()->user()->isAdmin()): ?>
                        <li class="nav-item"><a class="nav-link" href="<?php echo e(route('admin.appointments.index')); ?>">لوحة الطبيب</a></li>
                    <?php endif; ?>
                <?php endif; ?>
            </ul>

            <div class="d-flex gap-2">
                <?php if(auth()->guard()->guest()): ?>
                    <a class="btn btn-outline-dark rounded-pill px-3" href="<?php echo e(route('login')); ?>">
                        <i class="bi bi-box-arrow-in-left ms-1"></i>تسجيل دخول
                    </a>
                    <a class="btn btn-primary rounded-pill px-3" href="<?php echo e(route('register')); ?>">
                        <i class="bi bi-person-plus ms-1"></i>إنشاء حساب
                    </a>
                <?php endif; ?>

                <?php if(auth()->guard()->check()): ?>
                    <form method="POST" action="<?php echo e(route('logout')); ?>">
                        <?php echo csrf_field(); ?>
                        <button class="btn btn-dark rounded-pill px-3" type="submit">
                            <i class="bi bi-door-open ms-1"></i>خروج
                        </button>
                    </form>
                <?php endif; ?>
            </div>
        </div>
    </div>
</nav>

<main class="py-4">
    <div class="container">
        <?php if(session('success')): ?>
            <div class="alert alert-success soft-shadow border-0"><?php echo e(session('success')); ?></div>
        <?php endif; ?>
        <?php if(session('error')): ?>
            <div class="alert alert-danger soft-shadow border-0"><?php echo e(session('error')); ?></div>
        <?php endif; ?>

        <?php echo $__env->yieldContent('content'); ?>
    </div>
</main>

<footer class="py-4 mt-5">
    <div class="container text-center text-muted small">
        © <?php echo e(date('Y')); ?> Nova Clinic — حجز واستشارات بطريقة أنيقة
    </div>
</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<script src="<?php echo e(asset('assets/js/app.js')); ?>"></script>
</body>
</html>
<?php /**PATH C:\Users\Moon A\clinic-booking\resources\views/layouts/app.blade.php ENDPATH**/ ?>