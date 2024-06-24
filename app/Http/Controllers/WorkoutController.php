<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\WorkoutType;
use App\Models\WorkoutSession;
use App\Models\Exercise;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class WorkoutController extends Controller
{
    public function index()
    {
        $sharedWorkouts = WorkoutType::shared()->get();
        $userWorkouts = WorkoutType::userSpecific()->get();
        return view('workouts.index', compact('sharedWorkouts', 'userWorkouts'));
    }

    public function store(Request $request)
    {
        Log::info('Request received', $request->all());

        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        $workoutType = WorkoutType::create([
            'name' => $request->name,
            'user_id' => Auth::id(),
        ]);

        Log::info('Workout created', ['workout' => $workoutType]);

        return response()->json([
            'success' => true,
            'workout' => $workoutType,
        ]);
    }

    public function show($id)
    {
        $workoutSession = WorkoutSession::where('user_id', Auth::id())->findOrFail($id);

        $workoutType = $workoutSession->workoutType;

        return view('workouts.show', compact('workoutSession', 'workoutType'));
    }

    public function showWorkout(WorkoutType $workoutType)
    {
        $this->authorize('view', $workoutType);

        $workoutType->load('exercises');
        $sharedExercises = Exercise::shared()->get();
        $userExercises = Exercise::userSpecific()->get();
        return view('workouts.exercises', compact('workoutType', 'sharedExercises', 'userExercises'));
    }

    public function addExercise(Request $request, WorkoutType $workoutType)
    {
        $this->authorize('update', $workoutType);

        $workoutType->exercises()->attach($request->exercise_id);

        return redirect()->route('workouts.showWorkout', $workoutType->id);
    }

    public function removeExercise(WorkoutType $workoutType, Exercise $exercise)
    {
        $this->authorize('update', $workoutType);

        $workoutType->exercises()->detach($exercise->id);

        return redirect()->route('workouts.showWorkout', $workoutType->id);
    }

    public function startWorkout(WorkoutType $workoutType)
    {
        $this->authorize('view', $workoutType);

        $workoutType->load('exercises');
        return view('workouts.start', compact('workoutType'));
    }

    public function saveWorkoutSession(Request $request, WorkoutType $workoutType)
    {
        $this->authorize('view', $workoutType);

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
        $workoutSessions = WorkoutSession::with('workoutType', 'exercises')
                            ->where('user_id', Auth::id())
                            ->get();
        return view('workouts.sessions', compact('workoutSessions'));
    }

    public function destroy(WorkoutType $workoutType)
    {
        $this->authorize('delete', $workoutType);

        $workoutType->delete();

        return redirect()->route('workouts.index')->with('success', 'Workout deleted successfully.');
    }
}





