@extends('layouts.app')

@section('content')
<div class="container">
    <h1>My Past Workouts</h1>
    <a href="{{ route('dashboard') }}" class="btn btn-secondary mb-3">Back to Dashboard</a>
    <div class="table-responsive">
        <table class="table">
            <thead>
                <tr>
                    <th>Date</th>
                    <th>Workout Type</th>
                    <th>Duration (minutes)</th>
                    <th>Intensity</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($workoutSessions as $session)
                    <tr>
                        <td>{{ $session->workout_date->toFormattedDateString() }}</td>
                        <td>{{ $session->workoutType->name }}</td>
                        <td>{{ $session->duration }}</td>
                        <td>{{ $session->intensity }}</td>
                        <td>
                            <button class="btn btn-sm btn-info" data-bs-toggle="modal" data-bs-target="#sessionModal-{{ $session->id }}">More Details</button>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    @foreach ($workoutSessions as $session)
        <div class="modal fade" id="sessionModal-{{ $session->id }}" tabindex="-1" aria-labelledby="sessionModalLabel-{{ $session->id }}" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="sessionModalLabel-{{ $session->id }}">Workout Details</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <h4>{{ $session->workoutType->name }}</h4>
                        <p><strong>Date:</strong> {{ $session->workout_date->toFormattedDateString() }}</p>
                        <p><strong>Duration:</strong> {{ $session->duration }} minutes</p>
                        <p><strong>Intensity:</strong> {{ $session->intensity }}</p>
                        <h5>Exercises</h5>
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Exercise</th>
                                    <th>Set</th>
                                    <th>Reps</th>
                                    <th>Weight</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($session->workoutDetails as $detail)
                                    <tr>
                                        <td>{{ $detail->exercise->name }}</td>
                                        <td>{{ $detail->set_number }}</td>
                                        <td>{{ $detail->reps }}</td>
                                        <td>{{ $detail->weight }} kg</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
</div>
@endsection


