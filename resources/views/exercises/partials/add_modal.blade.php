<div class="modal fade" id="addExerciseModal" tabindex="-1" aria-labelledby="addExerciseModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addExerciseModalLabel">Add New Exercise</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form method="POST" action="{{ route('exercises.store') }}">
                @csrf
                <div class="modal-body">
                    <div class="mb-3">
                        <label class="form-label">Name</label>
                        <input type="text" class="form-control" name="name" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Description</label>
                        <textarea class="form-control" name="description" required></textarea>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Equipment Used</label>
                        <select class="form-control" name="equipment_used">
                            <option value="Dumbbell">Dumbbell</option>
                            <option value="Barbell">Barbell</option>
                            <option value="Machine">Machine</option>
                            <option value="Cables">Cables</option>
                            <option value="Body">Body Weight</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Rest Period (seconds)</label>
                        <input type="number" class="form-control" name="rest_period">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Difficulty</label>
                        <select class="form-control" name="difficulty">
                            <option value="Easy">Easy</option>
                            <option value="Medium">Medium</option>
                            <option value="Hard">Hard</option>
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
                    <button type="submit" class="btn btn-primary">Add Exercise</button>
                </div>
            </form>
        </div>
    </div>
</div>

