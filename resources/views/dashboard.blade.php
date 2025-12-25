@extends('layouts.app')

@section('content')
<h3 class="fw-bold mb-4">📊 Dashboard</h3>

<div class="row">
    <div class="col-md-4">
        <div class="card shadow text-center border-0">
            <div class="card-body">
                <h1>{{ $jobCount }}</h1>
                <p>Ishlar</p>
            </div>
        </div>
    </div>

    <div class="col-md-4">
        <div class="card shadow text-center border-0">
            <div class="card-body">
                <h1>{{ $applicationCount }}</h1>
                <p>Arizalar</p>
            </div>
        </div>
    </div>

    <div class="col-md-4">
        <div class="card shadow text-center border-0">
            <div class="card-body">
                <h1>{{ $messageCount }}</h1>
                <p>Xabarlar</p>
            </div>
        </div>
    </div>
</div>
@endsection
