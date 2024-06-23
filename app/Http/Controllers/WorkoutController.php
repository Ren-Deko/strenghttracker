<?php

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

    public function store(Request $request)
    {
        Log::info('Request received', $request->all());

        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        $workoutType = WorkoutType::create([
            'name' => $request->name,
        ]);

        Log::info('Workout created', ['workout' => $workoutType]);

        return response()->json([
            'success' => true,
            'workout' => $workoutType,
        ]);
    }

    public function show($id)
    {
        $workoutSession = WorkoutSession::findOrFail($id);

        // Debugging statements
        dd($workoutSession->toArray()); // Check if workout_type_id exists and has a value

        $workoutType = $workoutSession->workoutType; // Ensure this line is correct

        return view('workouts.show', compact('workoutSession', 'workoutType'));
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
    
        foreach ($request->reps as $exerciseId => $reps) {
            foreach ($reps as $index => $rep) {
                $session->exercises()->attach($exerciseId, [
                    'set_number' => $index + 1,
                    'reps' => $rep,
                    'weight' => $request->weight[$exerciseId][$index],
                ]);
            }
        }
    
        return redirect()->route('workouts.showWorkoutSessions');
    }
    

    public function showWorkoutSessions()
    {
        $workoutSessions = WorkoutSession::with('workout_type', 'exercises')->where('user_id', Auth::id())->get();
        return view('workouts.sessions', compact('workoutSessions'));
    }


    
}

