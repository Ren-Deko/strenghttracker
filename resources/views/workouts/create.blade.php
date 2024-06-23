@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Create New Workout</h1>
    <form method="POST" action="{{ route('workouts.store') }}">
        @csrf
        <div class="mb-3">
            <label for="workout_type_id" class="form-label">Workout Type</label>
            <select class="form-control" id="workout_type_id" name="workout_type_id">
                @foreach ($workoutTypes as $type)
                    <option value="{{ $type->id }}">{{ $type->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="workout_date" class="form-label">Workout Date</label>
            <input type="date" class="form-control" id="workout_date" name="workout_date" required>
        </div>
        <div class="mb-3">
            <label for="duration" class="form-label">Duration (minutes)</label>
            <input type="number" class="form-control" id="duration" name="duration">
        </div>
        <div class="mb-3">
            <label for="intensity" class="form-label">Intensity</label>
            <input type="text" class="form-control" id="intensity" name="intensity">
        </div>
        <button type="submit" class="btn btn-primary">Create Workout</button>
    </form>
</div>
@endsection
