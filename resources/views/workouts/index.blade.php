@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Workouts</h1>
    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#createWorkoutModal">Create New Workout</button>
    <ul class="list-group mt-3">
        @foreach ($workoutTypes as $type)
            <li class="list-group-item">
                {{ $type->name }}
                <a href="{{ route('workouts.showWorkout', $type->id) }}" class="btn btn-sm btn-success float-end">Show Workout</a>
                <a href="{{ route('workouts.startWorkout', $type->id) }}" class="btn btn-sm btn-primary float-end me-2">Start Workout</a>
            </li>
        @endforeach
    </ul>
</div>

<!-- Modal -->
<div class="modal fade" id="createWorkoutModal" tabindex="-1" aria-labelledby="createWorkoutModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="createWorkoutModalLabel">Create New Workout</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form id="createWorkoutForm">
          @csrf
          <div class="mb-3">
            <label for="workoutName" class="form-label">Workout Name</label>
            <input type="text" class="form-control" id="workoutName" name="name" required>
          </div>
          <button type="submit" class="btn btn-primary">Create Workout</button>
        </form>
      </div>
    </div>
  </div>
</div>
@endsection

@section('scripts')
<script>
document.getElementById('createWorkoutForm').addEventListener('submit', function(event) {
    event.preventDefault();
    let form = event.target;
    let formData = new FormData(form);
    
    fetch("{{ route('workouts.store') }}", {
        method: 'POST',
        headers: {
            'X-CSRF-TOKEN': formData.get('_token'),
            'Accept': 'application/json',
        },
        body: formData
    }).then(response => response.json())
    .then(data => {
        if(data.success) {
            let newWorkout = document.createElement('li');
            newWorkout.classList.add('list-group-item');
            newWorkout.innerHTML = `${data.workout.name} 
                <a href="{{ url('workouts') }}/${data.workout.id}/exercises" class="btn btn-sm btn-success float-end">Show Workout</a>
                <a href="{{ url('workouts') }}/${data.workout.id}/start" class="btn btn-sm btn-primary float-end me-2">Start Workout</a>`;
            document.querySelector('.list-group').appendChild(newWorkout);
            form.reset();
            new bootstrap.Modal(document.getElementById('createWorkoutModal')).hide();
        } else {
            alert('Error creating workout');
        }
    });
});
</script>
@endsection











