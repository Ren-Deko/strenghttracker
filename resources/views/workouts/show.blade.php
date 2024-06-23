<!-- resources/views/workouts/show.blade.php -->
@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Workout Session</h1>
    <p>Workout Type: {{ $workoutType->name }}</p>
    <!-- Display other details of the workout session -->
</div>
@endsection


