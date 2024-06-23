<?php

// app/Http/Controllers/WorkoutController.php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\WorkoutType;
use App\Models\WorkoutSession;
use App\Models\Exercise;
use Illuminate\Support\Facades\Auth;

class WorkoutController extends Controller
{
    public function index()
    {
        $workoutTypes = WorkoutType::all();
        return view('workouts.index', compact('workoutTypes'));
    }

    public function showWorkout(WorkoutType $workoutType)
    {
        $workoutType->load('exercises');
        $exercises = Exercise::all();
        return view('workouts.exercises', compact('workoutType', 'exercises'));
    }

    public function addExercise(Request $request, WorkoutType $workoutType)
    {
        $workoutType->exercises()->attach($request->exercise_id);

        return redirect()->route('workouts.showWorkout', $workoutType->id);
    }

    public function removeExercise(WorkoutType $workoutType, Exercise $exercise)
    {
        $workoutType->exercises()->detach($exercise->id);

        return redirect()->route('workouts.showWorkout', $workoutType->id);
    }

    public function startWorkout(WorkoutType $workoutType)
    {
        $workoutType->load('exercises');
        return view('workouts.start', compact('workoutType'));
    }

    public function saveWorkoutSession(Request $request, WorkoutType $workoutType)
    {
        $session = WorkoutSession::create([
            'workout_type_id' => $workoutType->id,
            'user_id' => Auth::id(),
            'workout_date' => now(),
            'duration' => $request->duration,
            'intensity' => $request->intensity,
        ]);

        foreach ($workoutType->exercises as $exercise) {
            $session->exercises()->attach($exercise->id, [
                'sets' => $request->sets[$exercise->id],
                'reps' => $request->reps[$exercise->id],
                'weight' => $request->weight[$exercise->id],
            ]);
        }

        return redirect()->route('workouts.showWorkoutSessions');
    }

    public function showWorkoutSessions()
    {
        $workoutSessions = WorkoutSession::with('workout_type', 'exercises')->where('user_id', Auth::id())->get();
        return view('workouts.sessions', compact('workoutSessions'));
    }
}



