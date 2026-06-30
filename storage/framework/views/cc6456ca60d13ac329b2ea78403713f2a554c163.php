

<?php $__env->startSection('content'); ?>
<div class="card border-0 soft-shadow rounded-4">
    <div class="card-body p-4">
        <div class="d-flex flex-wrap align-items-center justify-content-between gap-2 mb-3">
            <div>
                <h5 class="fw-bold mb-1">طلبات المواعيد</h5>
                <div class="text-muted small">قبول/رفض/تعديل/حذف مع إرسال رسالة تلقائياً للمستخدم.</div>
            </div>
            <span class="badge text-bg-dark rounded-pill px-3 py-2">
                إجمالي الطلبات: <?php echo e($appointments->count()); ?>

            </span>
        </div>

        <div class="table-responsive">
            <table class="table align-middle">
                <thead>
                <tr class="text-muted small">
                    <th>#</th>
                    <th>المستخدم</th>
                    <th>الهاتف</th>
                    <th>التاريخ</th>
                    <th>الوقت</th>
                    <th>الحالة</th>
                    <th>ملاحظة</th>
                    <th class="text-end">إجراءات</th>
                </tr>
                </thead>
                <tbody>
                <?php $__currentLoopData = $appointments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $a): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                        <td class="fw-bold"><?php echo e($a->id); ?></td>
                        <td>
                            <div class="fw-bold"><?php echo e($a->patient_name); ?></div>
                            <div class="text-muted small"><?php echo e($a->user->email); ?></div>
                        </td>
                        <td class="text-muted"><?php echo e($a->patient_phone ?? '—'); ?></td>
                        <td><?php echo e($a->date); ?></td>
                        <td><?php echo e($a->time); ?></td>
                        <td>
                            <?php if($a->status === 'pending'): ?>
                                <span class="badge text-bg-warning rounded-pill">Pending</span>
                            <?php elseif($a->status === 'approved'): ?>
                                <span class="badge text-bg-success rounded-pill">Approved</span>
                            <?php else: ?>
                                <span class="badge text-bg-danger rounded-pill">Rejected</span>
                            <?php endif; ?>
                        </td>
                        <td class="text-muted small"><?php echo e($a->admin_note ?? '—'); ?></td>
                        <td class="text-end">
                            <div class="d-flex flex-wrap gap-2 justify-content-end">
                                <a class="btn btn-outline-dark btn-sm rounded-pill" href="<?php echo e(route('admin.appointments.edit', $a)); ?>">
                                    تعديل
                                </a>

                                <?php if($a->status === 'pending'): ?>
                                    <form class="d-inline" method="POST" action="<?php echo e(route('admin.appointments.approve', $a)); ?>">
                                        <?php echo csrf_field(); ?>
                                        <input type="hidden" name="admin_note" value="">
                                        <button class="btn btn-success btn-sm rounded-pill" type="submit">
                                            قبول
                                        </button>
                                    </form>

                                    <button class="btn btn-danger btn-sm rounded-pill"
                                            data-bs-toggle="modal"
                                            data-bs-target="#rejectModal"
                                            data-id="<?php echo e($a->id); ?>">
                                        رفض
                                    </button>
                                <?php endif; ?>

                                <form class="d-inline" method="POST" action="<?php echo e(route('admin.appointments.destroy', $a)); ?>">
                                    <?php echo csrf_field(); ?> <?php echo method_field('DELETE'); ?>
                                    <button class="btn btn-outline-danger btn-sm rounded-pill confirm-delete" type="submit">
                                        حذف
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </tbody>
            </table>
        </div>

    </div>
</div>

<!-- Reject Modal -->
<div class="modal fade" id="rejectModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <form method="POST" class="modal-content rounded-4 border-0 soft-shadow" id="rejectForm">
            <?php echo csrf_field(); ?>
            <div class="modal-header">
                <h5 class="modal-title fw-bold">رفض موعد</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <label class="form-label">سبب الرفض (سيصل للمستخدم)</label>
                <textarea class="form-control rounded-3" name="admin_note" rows="4" required></textarea>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-light rounded-pill" data-bs-dismiss="modal">إلغاء</button>
                <button type="submit" class="btn btn-danger rounded-pill">تأكيد الرفض</button>
            </div>
        </form>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', ['title' => 'لوحة الطبيب'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Moon A\clinic-booking\resources\views/admin/dashboard.blade.php ENDPATH**/ ?>