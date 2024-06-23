@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Start {{ $workoutType->name }} Workout</h1>
    <form method="POST" action="{{ route('workouts.saveWorkoutSession', $workoutType->id) }}">
        @csrf
        <div class="mb-3">
            <label for="duration" class="form-label">Duration (minutes)</label>
            <input type="number" class="form-control" id="duration" name="duration" required>
        </div>
        <div class="mb-3">
            <label for="intensity" class="form-label">Intensity</label>
            <input type="text" class="form-control" id="intensity" name="intensity">
        </div>
        <h3>Exercises</h3>
        @foreach ($workoutType->exercises as $exercise)
            <div class="mb-3">
                <h4>{{ $exercise->name }}</h4>
                <div class="row">
                    <div class="col">
                        <label for="sets_{{ $exercise->id }}" class="form-label">Sets</label>
                        <input type="number" class="form-control" id="sets_{{ $exercise->id }}" name="sets[{{ $exercise->id }}]" required>
                    </div>
                    <div class="col">
                        <label for="reps_{{ $exercise->id }}" class="form-label">Reps</label>
                        <input type="number" class="form-control" id="reps_{{ $exercise->id }}" name="reps[{{ $exercise->id }}]" required>
                    </div>
                    <div class="col">
                        <label for="weight_{{ $exercise->id }}" class="form-label">Weight</label>
                        <input type="number" class="form-control" id="weight_{{ $exercise->id }}" name="weight[{{ $exercise->id }}]" required>
                    </div>
                </div>
            </div>
        @endforeach
        <button type="submit" class="btn btn-primary">Save Workout Session</button>
    </form>
</div>
@endsection


