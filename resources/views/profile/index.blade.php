@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Dashboard</h1>
    <p>Welcome back, {{ $user->name }}!</p>
    <div class="row mt-4">
        <div class="col-md-4">
            <a href="{{ route('exercises.index') }}" class="btn btn-primary btn-block">View Exercises</a>
        </div>
        <div class="col-md-4">
            <a href="{{ route('workouts.index') }}" class="btn btn-secondary btn-block">View Workouts</a>
        </div>
        <div class="col-md-4">
            <a href="{{ route('stats.index') }}" class="btn btn-info btn-block">View Stats</a>
        </div>
    </div>
</div>
@endsection
