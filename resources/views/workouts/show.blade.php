@extends('layouts.app')

@section('content')
<div class="container">
    <h1>{{ $workout->workout_type->name }} Workout on {{ $workout->workout_date }}</h1>
    <h2>Exercises</h2>
    <ul class="list-group">
        @foreach ($workout->exercises as $exercise)
            <li class="list-group-item">
                {{ $exercise->name }}
                <ul>
                    <li>Sets: {{ $exercise->pivot->sets }}</li>
                    <li>Reps: {{ $exercise->pivot->reps }}</li>
                    <li>Weight: {{ $exercise->pivot->weight }} kg</li>
                </ul>
            </li>
        @endforeach
    </ul>
</div>
@endsection

