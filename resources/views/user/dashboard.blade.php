@extends('layouts.app', ['title' => 'لوحة المستخدم'])

@section('content')
<div class="row g-3">
    <div class="col-lg-5">
        <div class="card border-0 soft-shadow rounded-4">
            <div class="card-body p-4">
                <h5 class="fw-bold mb-1">طلب موعد جديد</h5>
                <p class="text-muted small mb-4">املأ البيانات وسيصل الطلب للطبيب للمراجعة.</p>

                <form method="POST" action="{{ route('appointments.store') }}">
                    @csrf

                    <div class="mb-3">
                        <label class="form-label">اسم المريض</label>
                        <input class="form-control rounded-3" name="patient_name" value="{{ old('patient_name', auth()->user()->name) }}" required>
                        @error('patient_name')<div class="text-danger small mt-1">{{ $message }}</div>@enderror
                    </div>

                    <div class="mb-3">
                        <label class="form-label">رقم الهاتف</label>
                        <input class="form-control rounded-3" name="patient_phone" value="{{ old('patient_phone', auth()->user()->phone) }}">
                        @error('patient_phone')<div class="text-danger small mt-1">{{ $message }}</div>@enderror
                    </div>

                    <div class="mb-3">
                        <label class="form-label">وصف الحالة</label>
                        <textarea class="form-control rounded-3" name="complaint" rows="4" required>{{ old('complaint') }}</textarea>
                        @error('complaint')<div class="text-danger small mt-1">{{ $message }}</div>@enderror
                    </div>

                    <div class="row g-2 mb-3">
                        <div class="col-md-6">
                            <label class="form-label">التاريخ</label>
                            <input type="date" class="form-control rounded-3" name="date" value="{{ old('date') }}" required>
                            @error('date')<div class="text-danger small mt-1">{{ $message }}</div>@enderror
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">الوقت</label>
                            <input type="time" class="form-control rounded-3" name="time" value="{{ old('time') }}" required>
                            @error('time')<div class="text-danger small mt-1">{{ $message }}</div>@enderror
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
                    <a class="btn btn-outline-dark rounded-pill btn-sm" href="{{ route('notifications.index') }}">
                        الرسائل <i class="bi bi-bell ms-1"></i>
                    </a>
                </div>

                @if($appointments->isEmpty())
                    <div class="text-muted">لا يوجد طلبات بعد.</div>
                @else
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
                            @foreach($appointments as $a)
                                <tr>
                                    <td class="fw-bold">{{ $a->id }}</td>
                                    <td>{{ $a->date }}</td>
                                    <td>{{ $a->time }}</td>
                                    <td>
                                        @if($a->status === 'pending')
                                            <span class="badge text-bg-warning rounded-pill">قيد الانتظار</span>
                                        @elseif($a->status === 'approved')
                                            <span class="badge text-bg-success rounded-pill">مقبول</span>
                                        @else
                                            <span class="badge text-bg-danger rounded-pill">مرفوض</span>
                                        @endif
                                    </td>
                                    <td class="text-muted small">{{ $a->admin_note ?? '—' }}</td>
                                    <td class="text-end">
                                        @if($a->status === 'pending')
                                            <form method="POST" action="{{ route('appointments.destroy', $a) }}" class="d-inline">
                                                @csrf @method('DELETE')
                                                <button class="btn btn-outline-danger btn-sm rounded-pill confirm-delete" type="submit">
                                                    حذف
                                                </button>
                                            </form>
                                        @else
                                            <span class="text-muted small">—</span>
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                @endif

            </div>
        </div>
    </div>
</div>
@endsection
