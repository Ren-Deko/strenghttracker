@extends('layouts.app')

@section('content')
<div class="container">
    <h1>{{ $workoutType->name }} Exercises</h1>
    <ul class="list-group mt-3">
        @foreach ($workoutType->exercises as $exercise)
            <li class="list-group-item">
                {{ $exercise->name }} ({{ $exercise->user_id === null ? 'Shared' : 'Your Exercise' }})
                <form action="{{ route('workouts.removeExercise', [$workoutType->id, $exercise->id]) }}" method="POST" class="float-end me-2">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-sm btn-danger">Remove</button>
                </form>
            </li>
        @endforeach
    </ul>
    <h2>Add Exercise</h2>
    <form action="{{ route('workouts.addExercise', $workoutType->id) }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="exercise_id" class="form-label">Select Exercise</label>
            <select name="exercise_id" id="exercise_id" class="form-select">
                @foreach ($sharedExercises as $exercise)
                    <option value="{{ $exercise->id }}">{{ $exercise->name }} (Shared)</option>
                @endforeach
                @foreach ($userExercises as $exercise)
                    <option value="{{ $exercise->id }}">{{ $exercise->name }} (Your Exercise)</option>
                @endforeach
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Add Exercise</button>
    </form>
</div>
@endsection









