

<?php $__env->startSection('content'); ?>
<div class="hero-wrap p-4 p-lg-5 mb-4">
    <div class="row align-items-center g-4">
        <div class="col-lg-6">
            <span class="badge text-bg-light rounded-pill px-3 py-2 mb-3 soft-shadow">
                <i class="bi bi-shield-check ms-1"></i>حجز آمن + تذكيرات + سجل استشارات
            </span>
            <h1 class="display-5 fw-bold lh-sm mb-3">
                احجز موعدك في <span class="text-gradient">Nova Clinic</span> خلال دقيقة
            </h1>
            <p class="text-muted fs-5 mb-4">
                منصة أنيقة لحجز المواعيد وإدارة الاستشارات: جدول الطبيب، رسائل القبول/الرفض، وتاريخ الطلبات — وكل شيء مرتب.
            </p>

            <div class="d-flex flex-wrap gap-2">
                <?php if(auth()->guard()->guest()): ?>
                    <a class="btn btn-primary btn-lg rounded-pill px-4" href="<?php echo e(route('register')); ?>">
                        ابدأ الآن <i class="bi bi-arrow-left-short"></i>
                    </a>
                    <a class="btn btn-outline-dark btn-lg rounded-pill px-4" href="<?php echo e(route('login')); ?>">
                        تسجيل دخول
                    </a>
                <?php endif; ?>
                <?php if(auth()->guard()->check()): ?>
                    <a class="btn btn-primary btn-lg rounded-pill px-4" href="<?php echo e(route('dashboard')); ?>">
                        دخول لوحة التحكم <i class="bi bi-arrow-left-short"></i>
                    </a>
                <?php endif; ?>
            </div>

            <div class="mt-4 d-flex flex-wrap gap-3">
                <div class="mini-stat">
                    <i class="bi bi-calendar2-week"></i>
                    <div>
                        <div class="fw-bold">جدولة ذكية</div>
                        <div class="text-muted small">مواعيد منظمة وحالة واضحة</div>
                    </div>
                </div>
                <div class="mini-stat">
                    <i class="bi bi-chat-left-dots"></i>
                    <div>
                        <div class="fw-bold">رسائل فورية</div>
                        <div class="text-muted small">قبول/رفض مع ملاحظة للطبيب</div>
                    </div>
                </div>
                <div class="mini-stat">
                    <i class="bi bi-file-medical"></i>
                    <div>
                        <div class="fw-bold">سجل الطلبات</div>
                        <div class="text-muted small">ترجع لأي طلب بسهولة</div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-6">
            <div class="hero-card soft-shadow">
                <!-- مكان الصورة -->
                <!-- ضع الصورة هنا: public/assets/img/clinic-hero.jpg -->
                <img class="w-100 rounded-4" src="<?php echo e(asset('assets/img/clinic-hero.jpg')); ?>" alt="Clinic">
                <div class="p-3">
                    <div class="d-flex align-items-center justify-content-between">
                        <div>
                            <div class="fw-bold">عيادة متكاملة</div>
                            <div class="text-muted small">استقبال — متابعة — حجز — استشارات</div>
                        </div>
                        <span class="badge text-bg-primary rounded-pill px-3 py-2">VIP Care</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="row g-3">
    <div class="col-md-4">
        <div class="feature-card p-4 soft-shadow">
            <div class="icon-bubble"><i class="bi bi-clock-history"></i></div>
            <h5 class="fw-bold mt-3">تذكير وتنظيم</h5>
            <p class="text-muted mb-0">اطلع على الطلبات وحالتها: قيد الانتظار، مقبول، مرفوض.</p>
        </div>
    </div>
    <div class="col-md-4">
        <div class="feature-card p-4 soft-shadow">
            <div class="icon-bubble"><i class="bi bi-person-check"></i></div>
            <h5 class="fw-bold mt-3">لوحة للطبيب</h5>
            <p class="text-muted mb-0">قبول/رفض/تعديل/حذف + ملاحظة للطبيب + رسالة للمستخدم تلقائياً.</p>
        </div>
    </div>
    <div class="col-md-4">
        <div class="feature-card p-4 soft-shadow">
            <div class="icon-bubble"><i class="bi bi-lock"></i></div>
            <h5 class="fw-bold mt-3">صلاحيات واضحة</h5>
            <p class="text-muted mb-0">User للحجز والمتابعة، وAdmin لإدارة الطلبات بشكل كامل.</p>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
02
<?php echo $__env->make('layouts.app', ['title' => 'Nova Clinic - الرئيسية'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Moon A\clinic-booking\resources\views/home.blade.php ENDPATH**/ ?>