@extends('layouts.app', ['title' => 'الرسائل'])

@section('content')
<div class="card border-0 soft-shadow rounded-4">
    <div class="card-body p-4">
        <h5 class="fw-bold mb-3">رسائل العيادة</h5>

        @if($notifications->isEmpty())
            <div class="text-muted">لا يوجد رسائل.</div>
        @else
            <div class="list-group list-group-flush">
                @foreach($notifications as $n)
                    <div class="list-group-item py-3">
                        <div class="d-flex justify-content-between align-items-start gap-3">
                            <div>
                                <div class="fw-bold">{{ $n->title }}</div>
                                <div class="text-muted small">{{ $n->message }}</div>
                                <div class="text-muted small mt-1">{{ $n->created_at->diffForHumans() }}</div>
                            </div>

                            <div class="text-end">
                                @if(!$n->read_at)
                                    <form method="POST" action="{{ route('notifications.read', $n) }}">
                                        @csrf
                                        <button class="btn btn-sm btn-primary rounded-pill">تمت القراءة</button>
                                    </form>
                                @else
                                    <span class="badge text-bg-light rounded-pill">مقروء</span>
                                @endif
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @endif
    </div>
</div>
@endsection
