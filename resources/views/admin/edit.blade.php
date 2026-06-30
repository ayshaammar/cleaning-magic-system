@extends('layouts.app', ['title' => 'تعديل الطلب'])

@section('content')
<div class="card border-0 soft-shadow rounded-4">
    <div class="card-body p-4">
        <h5 class="fw-bold mb-3">تعديل طلب #{{ $appointment->id }}</h5>

        <form method="POST" action="{{ route('admin.appointments.update', $appointment) }}">
            @csrf @method('PUT')

            <div class="row g-2">
                <div class="col-md-6 mb-3">
                    <label class="form-label">اسم المريض</label>
                    <input class="form-control rounded-3" name="patient_name" value="{{ old('patient_name', $appointment->patient_name) }}" required>
                </div>
                <div class="col-md-6 mb-3">
                    <label class="form-label">هاتف المريض</label>
                    <input class="form-control rounded-3" name="patient_phone" value="{{ old('patient_phone', $appointment->patient_phone) }}">
                </div>

                <div class="col-12 mb-3">
                    <label class="form-label">وصف الحالة</label>
                    <textarea class="form-control rounded-3" name="complaint" rows="4" required>{{ old('complaint', $appointment->complaint) }}</textarea>
                </div>

                <div class="col-md-6 mb-3">
                    <label class="form-label">التاريخ</label>
                    <input type="date" class="form-control rounded-3" name="date" value="{{ old('date', $appointment->date) }}" required>
                </div>
                <div class="col-md-6 mb-3">
                    <label class="form-label">الوقت</label>
                    <input type="time" class="form-control rounded-3" name="time" value="{{ old('time', $appointment->time) }}" required>
                </div>

                <div class="col-12 mb-3">
                    <label class="form-label">ملاحظة الطبيب</label>
                    <textarea class="form-control rounded-3" name="admin_note" rows="3">{{ old('admin_note', $appointment->admin_note) }}</textarea>
                </div>
            </div>

            <div class="d-flex gap-2">
                <button class="btn btn-primary rounded-pill px-4">حفظ</button>
                <a class="btn btn-light rounded-pill px-4" href="{{ route('admin.appointments.index') }}">رجوع</a>
            </div>
        </form>
    </div>
</div>
@endsection
