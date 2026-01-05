@extends('layouts.app')

@section('content')
<div class="container my-5">
    <div class="row justify-content-center">
        <div class="col-lg-8 col-xl-6">
            <div class="card border-0 rounded-4 overflow-hidden" style="background: rgba(255,255,255,0.85); backdrop-filter: blur(20px); box-shadow: 0 8px 32px rgba(0,0,0,0.1);">
                <!-- Header gradient -->
                <div class="p-4 text-white" style="background: linear-gradient(135deg, #6366f1, #8b5cf6);">
                    <h4 class="mb-0 fw-bold text-center">💬 Suhbatlar</h4>
                </div>

                <div class="card-body p-0">
                    @if($users->count() > 0)
                        <div class="list-group list-group-flush">
                            @foreach($users as $user)
                                <a href="{{ route('messages.show', $user->id) }}" 
                                   class="list-group-item list-group-item-action border-0 px-4 py-4 transition-all hover:bg-gray-100"
                                   style="transition: all 0.3s ease;">
                                    <div class="d-flex align-items-center">
                                        <!-- Avatar (agar rasm bo‘lsa ishlat, aks holda ikon) -->
                                        <div class="position-relative me-4">
                                            <div class="rounded-circle overflow-hidden bg-gradient-primary d-flex align-items-center justify-content-center" 
                                                 style="width: 56px; height: 56px; background: linear-gradient(135deg, #a78bfa, #6366f1);">
                                                @if($user->avatar ?? false)
                                                    <img src="{{ asset('storage/' . $user->avatar) }}" class="w-100 h-100 object-cover">
                                                @else
                                                    <span class="text-white fs-3 fw-bold">{{ strtoupper(substr($user->name, 0, 2)) }}</span>
                                                @endif
                                            </div>
                                            <!-- Online status -->
                                            <span class="position-absolute bottom-0 end-0 rounded-circle bg-success border border-4 border-white" 
                                                  style="width: 16px; height: 16px;"></span>
                                        </div>

                                        <div class="flex-grow-1 min-w-0">
                                            <div class="d-flex justify-content-between align-items-center mb-1">
                                                <h6 class="mb-0 fw-semibold text-dark">{{ $user->name }}</h6>
                                                <small class="text-muted">12:45</small> <!-- Oxirgi xabar vaqti -->
                                            </div>
                                            <p class="mb-0 text-muted small text-truncate">
                                                Oxirgi xabar: Salom, ish haqida gaplashamizmi? 👋 <!-- Last message preview -->
                                            </p>
                                        </div>

                                        <!-- Unread badge (agar kerak bo‘lsa) -->
                                        <!-- <span class="badge bg-primary rounded-pill ms-3">3</span> -->
                                    </div>
                                </a>
                            @endforeach
                        </div>
                    @else
                        <div class="text-center py-8">
                            <div class="mb-4">
                                <i class="bi bi-chat-dots fs-1 text-muted"></i>
                            </div>
                            <p class="fs-5 text-muted mb-2">Hozircha suhbat yo‘q 😔</p>
                            <small class="text-muted">Ish egalariga yozib boshlang!</small>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

<!-- Qo‘shimcha CSS (layouts.app ga qo‘shing yoki inline) -->
<style>
    .hover\:bg-gray-100:hover {
        background-color: rgba(243, 244, 246, 0.8);
    }
    .transition-all {
        transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
    }
    .bg-gradient-primary {
        background: linear-gradient(135deg, #a78bfa, #6366f1);
    }
</style>