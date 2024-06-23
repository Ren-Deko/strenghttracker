@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Workouts</h1>
    <a href="{{ route('workouts.create') }}" class="btn btn-primary">Create New Workout</a>
    <ul class="list-group mt-3">
        @foreach ($workoutTypes as $type)
            <li class="list-group-item">
                {{ $type->name }}
                <a href="{{ route('workouts.showWorkout', $type->id) }}" class="btn btn-sm btn-success float-end">Show Workout</a>
                <a href="{{ route('workouts.startWorkout', $type->id) }}" class="btn btn-sm btn-primary float-end me-2">Start Workout</a>
            </li>
        @endforeach
    </ul>
</div>
@endsection







