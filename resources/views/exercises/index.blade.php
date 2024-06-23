@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Exercises</h1>
    <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addExerciseModal">Add New Exercise</button>

    <div class="table-responsive mt-3">
        <table class="table">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Description</th>
                    <th>Equipment Used</th>
                    <th>Rest Period (sec)</th>
                    <th>Difficulty</th>
                    <th>Target Body Part</th>
                    <th>Created At</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($exercises as $exercise)
                <tr>
                    <td>{{ $exercise->name }}</td>
                    <td>{{ $exercise->description }}</td>
                    <td>{{ $exercise->equipment_used }}</td>
                    <td>{{ $exercise->rest_period }}</td>
                    <td>{{ $exercise->difficulty }}</td>
                    <td>{{ $exercise->target_body_part }}</td>
                    <td>{{ $exercise->created_at->toFormattedDateString() }}</td>
                    <td>
                        <button class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#editExerciseModal-{{ $exercise->id }}">Edit</button>
                        <button class="btn btn-sm btn-danger" onclick="confirm('Are you sure you want to delete this exercise?') ? document.getElementById('delete-form-{{ $exercise->id }}').submit() : ''">Delete</button>
                        <form id="delete-form-{{ $exercise->id }}" action="{{ route('exercises.destroy', $exercise->id) }}" method="POST" style="display: none;">
                            @csrf
                            @method('DELETE')
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <!-- Add New Exercise Modal -->
    @include('exercises.partials.add_modal')

    <!-- Edit Exercise Modals for each exercise -->
    @foreach($exercises as $exercise)
        @include('exercises.partials.edit_modal', ['exercise' => $exercise])
    @endforeach

</div>
@endsection



