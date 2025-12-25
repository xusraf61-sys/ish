@extends('layouts.app')

@section('content')
<div class="container my-5">
    <div class="row justify-content-center">
        <div class="col-lg-8">
            <div class="card shadow-lg border-0 rounded-4">
                <div class="card-header text-white py-4" style="background: linear-gradient(135deg, #6366f1, #4f46e5); border-radius: 1rem 1rem 0 0;">
                    <h4 class="mb-0 fw-bold text-center">➕ Yangi ish joylash</h4>
                </div>

                <div class="card-body p-5">
                    <form method="POST" action="{{ route('jobs.store') }}">
                        @csrf

                        <div class="mb-4">
                            <label class="form-label fw-semibold">Lavozim</label>
                            <input type="text" name="title" class="form-control form-control-lg rounded-pill" required>
                        </div>

                        <div class="mb-4">
                            <label class="form-label fw-semibold">Tavsif</label>
                            <textarea name="description" class="form-control rounded-3" rows="6" required></textarea>
                        </div>

                        <div class="row g-4">
                            <div class="col-md-6">
                                <label class="form-label fw-semibold">Maosh</label>
                                <input type="text" name="salary" class="form-control form-control-lg rounded-pill" required>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label fw-semibold">Ish vaqti</label>
                                <input type="text" name="work_time" class="form-control form-control-lg rounded-pill" required>
                            </div>
                        </div>

                        <div class="mb-4 mt-4">
                            <label class="form-label fw-semibold">Manzil</label>
                            <input type="text" name="location" class="form-control form-control-lg rounded-pill" required>
                        </div>

                        <div class="text-center">
                            <button class="btn btn-success btn-lg px-5 shadow rounded-pill">
                                💾 Saqlash
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection