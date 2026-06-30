

<?php $__env->startSection('content'); ?>
<div class="card border-0 soft-shadow rounded-4">
    <div class="card-body p-4">
        <h5 class="fw-bold mb-3">تعديل طلب #<?php echo e($appointment->id); ?></h5>

        <form method="POST" action="<?php echo e(route('admin.appointments.update', $appointment)); ?>">
            <?php echo csrf_field(); ?> <?php echo method_field('PUT'); ?>

            <div class="row g-2">
                <div class="col-md-6 mb-3">
                    <label class="form-label">اسم المريض</label>
                    <input class="form-control rounded-3" name="patient_name" value="<?php echo e(old('patient_name', $appointment->patient_name)); ?>" required>
                </div>
                <div class="col-md-6 mb-3">
                    <label class="form-label">هاتف المريض</label>
                    <input class="form-control rounded-3" name="patient_phone" value="<?php echo e(old('patient_phone', $appointment->patient_phone)); ?>">
                </div>

                <div class="col-12 mb-3">
                    <label class="form-label">وصف الحالة</label>
                    <textarea class="form-control rounded-3" name="complaint" rows="4" required><?php echo e(old('complaint', $appointment->complaint)); ?></textarea>
                </div>

                <div class="col-md-6 mb-3">
                    <label class="form-label">التاريخ</label>
                    <input type="date" class="form-control rounded-3" name="date" value="<?php echo e(old('date', $appointment->date)); ?>" required>
                </div>
                <div class="col-md-6 mb-3">
                    <label class="form-label">الوقت</label>
                    <input type="time" class="form-control rounded-3" name="time" value="<?php echo e(old('time', $appointment->time)); ?>" required>
                </div>

                <div class="col-12 mb-3">
                    <label class="form-label">ملاحظة الطبيب</label>
                    <textarea class="form-control rounded-3" name="admin_note" rows="3"><?php echo e(old('admin_note', $appointment->admin_note)); ?></textarea>
                </div>
            </div>

            <div class="d-flex gap-2">
                <button class="btn btn-primary rounded-pill px-4">حفظ</button>
                <a class="btn btn-light rounded-pill px-4" href="<?php echo e(route('admin.appointments.index')); ?>">رجوع</a>
            </div>
        </form>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', ['title' => 'تعديل الطلب'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Moon A\clinic-booking\resources\views/admin/edit.blade.php ENDPATH**/ ?>