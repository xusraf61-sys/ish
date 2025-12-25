@extends('layouts.app')

@section('content')
<h3>🎓 Job Seeker Dashboard</h3>

<div class="row mt-4">
    <div class="col-md-4">
        <div class="card shadow text-center">
            <div class="card-body">
                <h5>Ishlarni ko‘rish</h5>
                <a href="{{ route('jobs.index') }}" class="btn btn-success mt-2">Ishlar</a>
            </div>
        </div>
    </div>
</div>
@endsection
