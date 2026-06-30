

<?php $__env->startSection('content'); ?>
<div class="card border-0 soft-shadow rounded-4">
    <div class="card-body p-4">
        <h5 class="fw-bold mb-3">رسائل العيادة</h5>

        <?php if($notifications->isEmpty()): ?>
            <div class="text-muted">لا يوجد رسائل.</div>
        <?php else: ?>
            <div class="list-group list-group-flush">
                <?php $__currentLoopData = $notifications; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $n): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="list-group-item py-3">
                        <div class="d-flex justify-content-between align-items-start gap-3">
                            <div>
                                <div class="fw-bold"><?php echo e($n->title); ?></div>
                                <div class="text-muted small"><?php echo e($n->message); ?></div>
                                <div class="text-muted small mt-1"><?php echo e($n->created_at->diffForHumans()); ?></div>
                            </div>

                            <div class="text-end">
                                <?php if(!$n->read_at): ?>
                                    <form method="POST" action="<?php echo e(route('notifications.read', $n)); ?>">
                                        <?php echo csrf_field(); ?>
                                        <button class="btn btn-sm btn-primary rounded-pill">تمت القراءة</button>
                                    </form>
                                <?php else: ?>
                                    <span class="badge text-bg-light rounded-pill">مقروء</span>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
        <?php endif; ?>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', ['title' => 'الرسائل'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Moon A\clinic-booking\resources\views/user/notifications.blade.php ENDPATH**/ ?>