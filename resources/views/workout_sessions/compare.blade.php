@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Compare Workouts</h1>
    <a href="{{ route('dashboard') }}" class="btn btn-secondary mb-3">Back to Dashboard</a>
    <form action="{{ route('workout_sessions.compare') }}" method="GET">
        <div class="row">
            <div class="col-md-6">
                <label for="session1_id" class="form-label">Select First Workout</label>
                <select name="session1_id" id="session1_id" class="form-select" required>
                    @foreach ($workoutSessions as $session)
                        <option value="{{ $session->id }}">{{ $session->workout_date->toFormattedDateString() }} - {{ $session->workoutType->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-md-6">
                <label for="session2_id" class="form-label">Select Second Workout</label>
                <select name="session2_id" id="session2_id" class="form-select" required>
                    @foreach ($workoutSessions as $session)
                        <option value="{{ $session->id }}">{{ $session->workout_date->toFormattedDateString() }} - {{ $session->workoutType->name }}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <button type="submit" class="btn btn-primary mt-3">Compare</button>
    </form>
</div>
@endsection
