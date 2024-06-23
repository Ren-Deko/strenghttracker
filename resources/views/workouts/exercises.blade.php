@extends('layouts.app')

@section('content')
<div class="container">
    <h1>{{ $workoutType->name }} Workout Exercises</h1>
    <ul class="list-group">
        @foreach ($workoutType->exercises as $exercise)
            <li class="list-group-item">
                {{ $exercise->name }}
                <form action="{{ route('workouts.removeExercise', [$workoutType->id, $exercise->id]) }}" method="POST" class="float-end">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-sm btn-danger">Remove</button>
                </form>
            </li>
        @endforeach
    </ul>

    <h2 class="mt-5">Add New Exercise</h2>
    <form method="POST" action="{{ route('workouts.addExercise', $workoutType->id) }}">
        @csrf
        <div class="mb-3">
            <label for="exercise_id" class="form-label">Exercise</label>
            <select class="form-control" id="exercise_id" name="exercise_id">
                @foreach ($exercises as $exercise)
                    <option value="{{ $exercise->id }}">{{ $exercise->name }}</option>
                @endforeach
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Add Exercise</button>
    </form>
</div>
@endsection







