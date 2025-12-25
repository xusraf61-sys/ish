@extends('layouts.app')

@section('content')
<div class="container my-5">
    <div class="row justify-content-center">
        <div class="col-lg-8 col-xl-7">
            <div class="card shadow-lg border-0 rounded-4 overflow-hidden">
                <div class="card-header text-white py-4" style="background: linear-gradient(135deg, #6366f1, #4f46e5);">
                    <div class="d-flex justify-content-between align-items-center">
                        <h5 class="mb-0 fw-bold">{{ $receiver->name }} bilan suhbat</h5>
                        <a href="{{ route('messages.index') }}" class="text-white">← Orqaga</a>
                    </div>
                </div>

                <div class="card-body p-4" id="chat-body" style="height: 550px; overflow-y: auto; background: #f8fafc;">
                    @forelse($messages as $message)
                        <div class="mb-4 d-flex flex-column {{ $message->sender_id == Auth::id() ? 'align-items-end' : 'align-items-start' }}">
                            <div class="rounded-4 px-4 py-3 shadow-sm mw-70
                                {{ $message->sender_id == Auth::id() ? 'text-white' : 'bg-white text-dark' }}"
                                style="{{ $message->sender_id == Auth::id() ? 'background: linear-gradient(135deg, #6366f1, #4f46e5);' : 'background: #ffffff;' }}">
                                {{ $message->message }}
                            </div>
                            <small class="text-muted mt-2">{{ $message->created_at->diffForHumans() }}</small>
                        </div>
                    @empty
                        <div class="text-center text-muted py-5">
                            <p class="lead">Hali xabar yo'q. Birinchi bo'lib yozing! 👋</p>
                        </div>
                    @endforelse
                </div>

                <div class="card-footer bg-white border-0 p-4">
                    <form method="POST" action="{{ route('messages.store') }}" id="message-form">
                        @csrf
                        <input type="hidden" name="receiver_id" value="{{ $receiver->id }}">
                        <div class="input-group input-group-lg">
                            <input type="text" name="message" class="form-control rounded-start-pill" placeholder="Xabar yozing..." required autofocus>
                            <button type="submit" class="btn btn-primary rounded-end-pill px-5">Yuborish</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
    document.getElementById('message-form').addEventListener('submit', function() {
        setTimeout(() => {
            document.getElementById('chat-body').scrollTop = document.getElementById('chat-body').scrollHeight;
        }, 100);
    });
    window.onload = () => {
        document.getElementById('chat-body').scrollTop = document.getElementById('chat-body').scrollHeight;
    };
</script>
@endpush