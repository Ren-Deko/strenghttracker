@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Your Workout Sessions</h1>
    <ul class="list-group">
        @foreach ($workoutSessions as $session)
            <li class="list-group-item">
                <h4>{{ $session->workout_type->name }} on {{ $session->workout_date }}</h4>
                <p>Duration: {{ $session->duration }} minutes</p>
                <p>Intensity: {{ $session->intensity }}</p>
                <ul>
                    @foreach ($session->exercises as $exercise)
                        <li>
                            {{ $exercise->name }}: {{ $exercise->pivot->sets }} sets, {{ $exercise->pivot->reps }} reps, {{ $exercise->pivot->weight }} kg
                        </li>
                    @endforeach
                </ul>
            </li>
        @endforeach
    </ul>
</div>
@endsection

