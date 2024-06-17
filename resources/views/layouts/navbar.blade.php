<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container-fluid">
        <a class="navbar-brand" href="{{ url('/') }}">StrengthTracker</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
            <div class="navbar-nav">
                <a class="nav-link active" aria-current="page" href="{{ url('/') }}">Home</a>
                <a class="nav-link" href="{{ route('profiles.index') }}">Profiles</a>
                <a class="nav-link" href="{{ route('exercises.index') }}">Exercises</a>
                <a class="nav-link" href="{{ route('workouts.index') }}">Workouts</a>
                <a class="nav-link" href="{{ route('predefined_workouts.index') }}">Predefined Workouts</a>
            </div>
        </div>
    </div>
</nav>
