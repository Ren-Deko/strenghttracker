@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Compare Workouts</h1>
    <a href="{{ route('dashboard') }}" class="btn btn-secondary mb-3">Back to Dashboard</a>

    <form action="{{ route('workouts.compare') }}" method="GET">
        <div class="row mb-3">
            <div class="col">
                <label for="workout1" class="form-label">Select First Workout</label>
                <select class="form-select" id="workout1" name="workout1" required>
                    <option value="" disabled selected>Select a workout</option>
                    @foreach($workouts as $workout)
                        <option value="{{ $workout->id }}">{{ $workout->workoutType->name }} - {{ $workout->workout_date->toFormattedDateString() }}</option>
                    @endforeach
                </select>
            </div>
            <div class="col">
                <label for="workout2" class="form-label">Select Second Workout</label>
                <select class="form-select" id="workout2" name="workout2" required>
                    <option value="" disabled selected>Select a workout</option>
                    @foreach($workouts as $workout)
                        <option value="{{ $workout->id }}">{{ $workout->workoutType->name }} - {{ $workout->workout_date->toFormattedDateString() }}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <button type="submit" class="btn btn-primary">Compare</button>
    </form>

    @if(isset($comparison))
        <h2 class="mt-5">Comparison Results</h2>
        <div class="table-responsive">
            <table class="table">
                <thead>
                    <tr>
                        <th>Exercise</th>
                        <th>Workout 1 Max Weight (kg)</th>
                        <th>Workout 2 Max Weight (kg)</th>
                        <th>Difference (kg)</th>
                        <th>Percentage Change (%)</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($comparison as $exercise => $data)
                        <tr>
                            <td>{{ $exercise }}</td>
                            <td>{{ $data['workout1'] }}</td>
                            <td>{{ $data['workout2'] }}</td>
                            <td>{{ $data['difference'] }}</td>
                            <td>{{ $data['percentage_change'] }}%</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    @endif
</div>
@endsection

