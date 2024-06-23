<div class="modal fade" id="editExerciseModal-{{ $exercise->id }}" tabindex="-1" aria-labelledby="editExerciseModalLabel-{{ $exercise->id }}" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editExerciseModalLabel-{{ $exercise->id }}">Edit Exercise</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form method="POST" action="{{ route('exercises.update', $exercise->id) }}">
                @csrf
                @method('PUT')
                <div class="modal-body">
                    <div class="mb-3">
                        <label class="form-label">Name</label>
                        <input type="text" class="form-control" name="name" value="{{ $exercise->name }}" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Description</label>
                        <textarea class="form-control" name="description">{{ $exercise->description }}</textarea>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Equipment Used</label>
                        <select class="form-control" name="equipment_used">
                            <option value="Dumbbell" {{ $exercise->equipment_used == 'Dumbbell' ? 'selected' : '' }}>Dumbbell</option>
                            <option value="Barbell" {{ $exercise->equipment_used == 'Barbell' ? 'selected' : '' }}>Barbell</option>
                            <option value="Machine" {{ $exercise->equipment_used == 'Machine' ? 'selected' : '' }}>Machine</option>
                            <option value="Cables" {{ $exercise->equipment_used == 'Cables' ? 'selected' : '' }}>Cables</option>
                            <option value="Body" {{ $exercise->equipment_used == 'Body' ? 'selected' : '' }}>Body Weight</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Rest Period (seconds)</label>
                        <input type="number" class="form-control" name="rest_period" value="{{ $exercise->rest_period }}">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Difficulty</label>
                        <select class="form-control" name="difficulty">
                            <option value="Easy" {{ $exercise->difficulty == 'Easy' ? 'selected' : '' }}>Easy</option>
                            <option value="Medium" {{ $exercise->difficulty == 'Medium' ? 'selected' : '' }}>Medium</option>
                            <option value="Hard" {{ $exercise->difficulty == 'Hard' ? 'selected' : '' }}>Hard</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Target Body Part</label>
                        <select class="form-control" name="target_body_part">
                            <option value="Chest" {{ $exercise->target_body_part == 'Chest' ? 'selected' : '' }}>Chest</option>
                            <option value="Back" {{ $exercise->target_body_part == 'Back' ? 'selected' : '' }}>Back</option>
                            <option value="Legs" {{ $exercise->target_body_part == 'Legs' ? 'selected' : '' }}>Legs</option>
                            <option value="Arms" {{ $exercise->target_body_part == 'Arms' ? 'selected' : '' }}>Arms</option>
                            <option value="Shoulders" {{ $exercise->target_body_part == 'Shoulders' ? 'selected' : '' }}>Shoulders</option>
                            <option value="Core" {{ $exercise->target_body_part == 'Core' ? 'selected' : '' }}>Core</option>
                        </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save Changes</button>
                </div>
            </form>
        </div>
    </div>
</div>
