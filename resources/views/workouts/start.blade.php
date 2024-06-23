@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Start Workout: {{ $workoutType->name }}</h1>
    <form method="POST" action="{{ route('workouts.saveWorkoutSession', $workoutType->id) }}">
        @csrf
        @foreach ($workoutType->exercises as $exercise)
            <div class="card mb-3">
                <div class="card-header">
                    {{ $exercise->name }}
                </div>
                <div class="card-body">
                    <div id="exercise-{{ $exercise->id }}">
                        <div class="set-group mb-3">
                            <label>Set 1</label>
                            <div class="row">
                                <div class="col-md-6">
                                    <input type="number" name="reps[{{ $exercise->id }}][]" class="form-control" placeholder="Reps" required>
                                </div>
                                <div class="col-md-6">
                                    <input type="number" name="weight[{{ $exercise->id }}][]" class="form-control" placeholder="Weight" required>
                                </div>
                            </div>
                        </div>
                    </div>
                    <button type="button" class="btn btn-secondary btn-add-set" data-exercise-id="{{ $exercise->id }}">Add Set</button>
                </div>
            </div>
        @endforeach
        <button type="submit" class="btn btn-primary">Save Workout Session</button>
    </form>
</div>
@endsection

@section('scripts')
<script>
document.addEventListener('DOMContentLoaded', function () {
    document.querySelectorAll('.btn-add-set').forEach(button => {
        button.addEventListener('click', function () {
            let exerciseId = this.getAttribute('data-exercise-id');
            let exerciseDiv = document.getElementById('exercise-' + exerciseId);
            let setCount = exerciseDiv.querySelectorAll('.set-group').length + 1;
            let newSet = document.createElement('div');
            newSet.classList.add('set-group', 'mb-3');
            newSet.innerHTML = `
                <label>Set ${setCount}</label>
                <div class="row">
                    <div class="col-md-6">
                        <input type="number" name="reps[${exerciseId}][]" class="form-control" placeholder="Reps" required>
                    </div>
                    <div class="col-md-6">
                        <input type="number" name="weight[${exerciseId}][]" class="form-control" placeholder="Weight" required>
                    </div>
                    <div class="col-md-12 mt-2">
                        <button type="button" class="btn btn-danger remove-set">Remove Set</button>
                    </div>
                </div>
            `;
            exerciseDiv.appendChild(newSet);
            
            // Add event listener to the remove button
            newSet.querySelector('.remove-set').addEventListener('click', function() {
                this.parentElement.parentElement.remove(); // Remove the set group div
            });
        });
    });
});

</script>
@endsection



