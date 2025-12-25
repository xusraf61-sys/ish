@extends('layouts.app')

@section('content')
<div class="container my-5">
    <div class="row justify-content-center">
        <div class="col-lg-8 col-xl-6">
            <div class="card shadow-lg border-0 rounded-4">
                <div class="card-header text-white py-4" style="background: linear-gradient(135deg, #6366f1, #4f46e5);">
                    <h4 class="mb-0 fw-bold text-center">💬 Suhbatlar</h4>
                </div>

                <div class="card-body p-4">
                    @if($users->count() > 0)
                        <div class="list-group list-group-flush">
                            @foreach($users as $user)
                                <a href="{{ route('messages.show', $user->id) }}" 
                                   class="list-group-item list-group-item-action py-4 rounded-3 mb-3 shadow-sm">
                                    <div class="d-flex align-items-center">
                                        <div class="bg-light rounded-circle p-3 me-3">
                                            <i class="bi bi-person fs-3 text-primary"></i>
                                        </div>
                                        <div>
                                            <strong class="fs-5">{{ $user->name }}</strong>
                                            <small class="text-muted d-block">Yozish →</small>
                                        </div>
                                    </div>
                                </a>
                            @endforeach
                        </div>
                    @else
                        <div class="text-center py-5">
                            <p class="fs-4 text-muted">Hozircha suhbat yo'q 😔</p>
                            <small>Ish egalariga yozib boshlang!</small>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection