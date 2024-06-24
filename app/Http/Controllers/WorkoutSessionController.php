<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\WorkoutSession;
use App\Models\WorkoutDetail;
use App\Models\Exercise;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;


class WorkoutSessionController extends Controller
{
    public function index()
    {
        $workoutSessions = WorkoutSession::where('user_id', Auth::id())->get();
        
        foreach ($workoutSessions as $session) {
            // Check if workout_date is a Carbon instance
        }
        
        return view('workout_sessions.index', compact('workoutSessions'));
    }
    public function store(Request $request)
    {
        $request->validate([
            'workout_type_id' => 'required|exists:workout_types,id',
            'duration' => 'nullable|integer',
            'intensity' => 'nullable|string',
            'workout_date' => 'required|date',
            'exercises' => 'required|array',
            'exercises.*.exercise_id' => 'required|exists:exercises,id',
            'exercises.*.sets' => 'required|array',
            'exercises.*.sets.*.reps' => 'required|integer',
            'exercises.*.sets.*.weight' => 'required|numeric',
        ]);

        $workoutSession = WorkoutSession::create([
            'user_id' => Auth::id(),
            'workout_type_id' => $request->workout_type_id,
            'workout_date' => $request->workout_date,
            'duration' => $request->duration,
            'intensity' => $request->intensity,
        ]);

        foreach ($request->exercises as $exerciseData) {
            foreach ($exerciseData['sets'] as $set) {
                WorkoutDetail::create([
                    'workout_session_id' => $workoutSession->id,
                    'exercise_id' => $exerciseData['exercise_id'],
                    'set_number' => $set['set_number'],
                    'reps' => $set['reps'],
                    'weight' => $set['weight'],
                ]);
            }
        }

        return redirect()->route('workout_sessions.index')->with('success', 'Workout session saved successfully.');
    }

    public function show($id)
    {
        $workoutSession = WorkoutSession::where('user_id', Auth::id())->findOrFail($id);
        return view('workout_sessions.show', compact('workoutSession'));
    }

    public function showCompareForm()
    {
        $workouts = WorkoutSession::where('user_id', Auth::id())->with('workoutType')->get();
        return view('compare_workouts', compact('workouts'));
    }

    public function compareWorkouts(Request $request)
    {
        $workout1 = WorkoutSession::where('user_id', Auth::id())->with('exercises')->findOrFail($request->workout1);
        $workout2 = WorkoutSession::where('user_id', Auth::id())->with('exercises')->findOrFail($request->workout2);

        $comparison = [];
        $allExercises = $workout1->exercises->merge($workout2->exercises)->unique('id');

        foreach ($allExercises as $exercise) {
            $workout1Max = $workout1->exercises->where('id', $exercise->id)->max('pivot.weight');
            $workout2Max = $workout2->exercises->where('id', $exercise->id)->max('pivot.weight');
            $difference = $workout2Max - $workout1Max;
            $percentageChange = $workout1Max ? ($difference / $workout1Max) * 100 : 0;

            $comparison[$exercise->name] = [
                'workout1' => $workout1Max,
                'workout2' => $workout2Max,
                'difference' => $difference,
                'percentage_change' => round($percentageChange, 2),
            ];
        }

        return view('compare_workouts', [
            'workouts' => WorkoutSession::where('user_id', Auth::id())->with('workoutType')->get(),
            'comparison' => $comparison,
        ]);
    }
}
