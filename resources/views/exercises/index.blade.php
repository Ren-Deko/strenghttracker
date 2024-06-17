@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Exercises</h1>
    <a href="{{ route('exercises.create') }}" class="btn btn-primary">Add Exercise</a>
    <ul class="list-group">
        @foreach ($exercises as $exercise)
            <li class="list-group-item">
                <a href="{{ route('exercises.show', $exercise) }}">{{ $exercise->name }}</a>
                <p>{{ $exercise->description }}</p>
            </li>
        @endforeach
    </ul>
</div>
@endsection
