@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Workouts</h1>
    <a href="{{ route('workouts.create') }}" class="btn btn-primary">Add Workout</a>
    <div class="list-group">
        @foreach ($workouts as $workout)
            <a href="{{ route('workouts.show', $workout) }}" class="list-group-item list-group-item-action">
                Workout on {{ $workout->workout_date->format('Y-m-d') }}
            </a>
        @endforeach
    </div>
</div>
@endsection
