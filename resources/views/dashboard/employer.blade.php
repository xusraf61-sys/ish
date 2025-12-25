@extends('layouts.app')

@section('content')
<h3>👔 Employer Dashboard</h3>

<div class="row mt-4">
    <div class="col-md-4">
        <div class="card shadow text-center">
            <div class="card-body">
                <h5>Ish joylash</h5>
                <a href="{{ route('jobs.create') }}" class="btn btn-dark mt-2">Yangi ish</a>
            </div>
        </div>
    </div>
</div>
@endsection
