@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Exercises</h1>
    <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addExerciseModal">Add New Exercise</button>
    <a href="{{ route('dashboard') }}" class="btn btn-secondary">Back to Dashboard</a>

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
                        @if (!$exercise->isShared() && $exercise->user_id == Auth::id())
                            <button class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#editExerciseModal-{{ $exercise->id }}">Edit</button>
                            <button class="btn btn-sm btn-danger" onclick="confirm('Are you sure you want to delete this exercise?') ? document.getElementById('delete-form-{{ $exercise->id }}').submit() : ''">Delete</button>
                            <form id="delete-form-{{ $exercise->id }}" action="{{ route('exercises.destroy', $exercise->id) }}" method="POST" style="display: none;">
                                @csrf
                                @method('DELETE')
                            </form>
                        @endif
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <!-- Add New Exercise Modal -->
    <div class="modal fade" id="addExerciseModal" tabindex="-1" aria-labelledby="addExerciseModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addExerciseModalLabel">Add New Exercise</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('exercises.store') }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label for="exerciseName" class="form-label">Exercise Name</label>
                            <input type="text" class="form-control" id="exerciseName" name="name" required>
                        </div>
                        <div class="mb-3">
                            <label for="exerciseDescription" class="form-label">Description</label>
                            <textarea class="form-control" id="exerciseDescription" name="description" required></textarea>
                        </div>
                        <div class="mb-3">
                            <label for="equipmentUsed" class="form-label">Equipment Used</label>
                            <select class="form-select" id="equipmentUsed" name="equipment_used" required>
                                <option value="Dumbbell">Dumbbell</option>
                                <option value="Barbell">Barbell</option>
                                <option value="Machine">Machine</option>
                                <option value="Cables">Cables</option>
                                <option value="Body">Body</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="restPeriod" class="form-label">Rest Period</label>
                            <input type="number" class="form-control" id="restPeriod" name="rest_period" required>
                        </div>
                        <div class="mb-3">
                            <label for="difficulty" class="form-label">Difficulty</label>
                            <select class="form-select" id="difficulty" name="difficulty" required>
                                <option value="Easy">Easy</option>
                                <option value="Medium">Medium</option>
                                <option value="Hard">Hard</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="targetBodyPart" class="form-label">Target Body Part</label>
                            <select class="form-select" id="targetBodyPart" name="target_body_part" required>
                                <option value="Chest">Chest</option>
                                <option value="Back">Back</option>
                                <option value="Quads">Quads</option>
                                <option value="Ankles">Ankles</option>
                                <option value="Glutes">Glutes</option>
                                <option value="Biceps">Biceps</option>
                                <option value="Forearms">Forearms</option>
                                <option value="Shoulders">Shoulders</option>
                                <option value="Triceps">Triceps</option>
                            </select>
                        </div>
                        <button type="submit" class="btn btn-primary">Add Exercise</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Edit Exercise Modals for each exercise -->
    @foreach($exercises as $exercise)
    <div class="modal fade" id="editExerciseModal-{{ $exercise->id }}" tabindex="-1" aria-labelledby="editExerciseModalLabel-{{ $exercise->id }}" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editExerciseModalLabel-{{ $exercise->id }}">Edit Exercise</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('exercises.update', $exercise->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="mb-3">
                            <label for="exerciseName" class="form-label">Exercise Name</label>
                            <input type="text" class="form-control" id="exerciseName" name="name" value="{{ $exercise->name }}" required>
                        </div>
                        <div class="mb-3">
                            <label for="exerciseDescription" class="form-label">Description</label>
                            <textarea class="form-control" id="exerciseDescription" name="description" required>{{ $exercise->description }}</textarea>
                        </div>
                        <div class="mb-3">
                            <label for="equipmentUsed" class="form-label">Equipment Used</label>
                            <select class="form-select" id="equipmentUsed" name="equipment_used" required>
                                <option value="Dumbbell" {{ $exercise->equipment_used == 'Dumbbell' ? 'selected' : '' }}>Dumbbell</option>
                                <option value="Barbell" {{ $exercise->equipment_used == 'Barbell' ? 'selected' : '' }}>Barbell</option>
                                <option value="Machine" {{ $exercise->equipment_used == 'Machine' ? 'selected' : '' }}>Machine</option>
                                <option value="Cables" {{ $exercise->equipment_used == 'Cables' ? 'selected' : '' }}>Cables</option>
                                <option value="Body" {{ $exercise->equipment_used == 'Body' ? 'selected' : '' }}>Body</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="restPeriod" class="form-label">Rest Period</label>
                            <input type="number" class="form-control" id="restPeriod" name="rest_period" value="{{ $exercise->rest_period }}" required>
                        </div>
                        <div class="mb-3">
                            <label for="difficulty" class="form-label">Difficulty</label>
                            <select class="form-select" id="difficulty" name="difficulty" required>
                                <option value="Easy" {{ $exercise->difficulty == 'Easy' ? 'selected' : '' }}>Easy</option>
                                <option value="Medium" {{ $exercise->difficulty == 'Medium' ? 'selected' : '' }}>Medium</option>
                                <option value="Hard" {{ $exercise->difficulty == 'Hard' ? 'selected' : '' }}>Hard</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="targetBodyPart" class="form-label">Target Body Part</label>
                            <select class="form-select" id="targetBodyPart" name="target_body_part" required>
                                <option value="Chest" {{ $exercise->target_body_part == 'Chest' ? 'selected' : '' }}>Chest</option>
                                <option value="Back" {{ $exercise->target_body_part == 'Back' ? 'selected' : '' }}>Back</option>
                                <option value="Quads" {{ $exercise->target_body_part == 'Quads' ? 'selected' : '' }}>Quads</option>
                                <option value="Ankles" {{ $exercise->target_body_part == 'Ankles' ? 'selected' : '' }}>Ankles</option>
                                <option value="Glutes" {{ $exercise->target_body_part == 'Glutes' ? 'selected' : '' }}>Glutes</option>
                                <option value="Biceps" {{ $exercise->target_body_part == 'Biceps' ? 'selected' : '' }}>Biceps</option>
                                <option value="Forearms" {{ $exercise->target_body_part == 'Forearms' ? 'selected' : '' }}>Forearms</option>
                                <option value="Shoulders" {{ $exercise->target_body_part == 'Shoulders' ? 'selected' : '' }}>Shoulders</option>
                                <option value="Triceps" {{ $exercise->target_body_part == 'Triceps' ? 'selected' : '' }}>Triceps</option>
                            </select>
                        </div>
                        <button type="submit" class="btn btn-primary">Update Exercise</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    @endforeach
</div>
@endsection





