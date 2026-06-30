

<?php $__env->startSection('content'); ?>
<div class="row g-3">
    <div class="col-lg-5">
        <div class="card border-0 soft-shadow rounded-4">
            <div class="card-body p-4">
                <h5 class="fw-bold mb-1">طلب موعد جديد</h5>
                <p class="text-muted small mb-4">املأ البيانات وسيصل الطلب للطبيب للمراجعة.</p>

                <form method="POST" action="<?php echo e(route('appointments.store')); ?>">
                    <?php echo csrf_field(); ?>

                    <div class="mb-3">
                        <label class="form-label">اسم المريض</label>
                        <input class="form-control rounded-3" name="patient_name" value="<?php echo e(old('patient_name', auth()->user()->name)); ?>" required>
                        <?php $__errorArgs = ['patient_name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?><div class="text-danger small mt-1"><?php echo e($message); ?></div><?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">رقم الهاتف</label>
                        <input class="form-control rounded-3" name="patient_phone" value="<?php echo e(old('patient_phone', auth()->user()->phone)); ?>">
                        <?php $__errorArgs = ['patient_phone'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?><div class="text-danger small mt-1"><?php echo e($message); ?></div><?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">وصف الحالة</label>
                        <textarea class="form-control rounded-3" name="complaint" rows="4" required><?php echo e(old('complaint')); ?></textarea>
                        <?php $__errorArgs = ['complaint'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?><div class="text-danger small mt-1"><?php echo e($message); ?></div><?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    </div>

                    <div class="row g-2 mb-3">
                        <div class="col-md-6">
                            <label class="form-label">التاريخ</label>
                            <input type="date" class="form-control rounded-3" name="date" value="<?php echo e(old('date')); ?>" required>
                            <?php $__errorArgs = ['date'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?><div class="text-danger small mt-1"><?php echo e($message); ?></div><?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">الوقت</label>
                            <input type="time" class="form-control rounded-3" name="time" value="<?php echo e(old('time')); ?>" required>
                            <?php $__errorArgs = ['time'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?><div class="text-danger small mt-1"><?php echo e($message); ?></div><?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        </div>
                    </div>

                    <button class="btn btn-primary w-100 rounded-pill py-2">
                        إرسال الطلب <i class="bi bi-send ms-1"></i>
                    </button>
                </form>

            </div>
        </div>
    </div>

    <div class="col-lg-7">
        <div class="card border-0 soft-shadow rounded-4">
            <div class="card-body p-4">
                <div class="d-flex align-items-center justify-content-between mb-3">
                    <h5 class="fw-bold mb-0">طلباتي</h5>
                    <a class="btn btn-outline-dark rounded-pill btn-sm" href="<?php echo e(route('notifications.index')); ?>">
                        الرسائل <i class="bi bi-bell ms-1"></i>
                    </a>
                </div>

                <?php if($appointments->isEmpty()): ?>
                    <div class="text-muted">لا يوجد طلبات بعد.</div>
                <?php else: ?>
                    <div class="table-responsive">
                        <table class="table align-middle">
                            <thead>
                            <tr class="text-muted small">
                                <th>#</th>
                                <th>التاريخ</th>
                                <th>الوقت</th>
                                <th>الحالة</th>
                                <th>ملاحظة الطبيب</th>
                                <th></th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php $__currentLoopData = $appointments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $a): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <td class="fw-bold"><?php echo e($a->id); ?></td>
                                    <td><?php echo e($a->date); ?></td>
                                    <td><?php echo e($a->time); ?></td>
                                    <td>
                                        <?php if($a->status === 'pending'): ?>
                                            <span class="badge text-bg-warning rounded-pill">قيد الانتظار</span>
                                        <?php elseif($a->status === 'approved'): ?>
                                            <span class="badge text-bg-success rounded-pill">مقبول</span>
                                        <?php else: ?>
                                            <span class="badge text-bg-danger rounded-pill">مرفوض</span>
                                        <?php endif; ?>
                                    </td>
                                    <td class="text-muted small"><?php echo e($a->admin_note ?? '—'); ?></td>
                                    <td class="text-end">
                                        <?php if($a->status === 'pending'): ?>
                                            <form method="POST" action="<?php echo e(route('appointments.destroy', $a)); ?>" class="d-inline">
                                                <?php echo csrf_field(); ?> <?php echo method_field('DELETE'); ?>
                                                <button class="btn btn-outline-danger btn-sm rounded-pill confirm-delete" type="submit">
                                                    حذف
                                                </button>
                                            </form>
                                        <?php else: ?>
                                            <span class="text-muted small">—</span>
                                        <?php endif; ?>
                                    </td>
                                </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </tbody>
                        </table>
                    </div>
                <?php endif; ?>

            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', ['title' => 'لوحة المستخدم'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Moon A\clinic-booking\resources\views/user/dashboard.blade.php ENDPATH**/ ?>