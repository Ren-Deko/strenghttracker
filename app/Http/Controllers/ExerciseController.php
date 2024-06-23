<?php

namespace App\Http\Controllers;

use App\Models\Exercise;
use Illuminate\Http\Request;

class ExerciseController extends Controller
{
    public function workout_sessions()
    {
        return $this->belongsToMany(WorkoutSession::class, 'exercise_workout')->withPivot('sets', 'reps', 'weight');
    }

    public function workout_types()
    {
        return $this->belongsToMany(WorkoutType::class, 'exercise_workout');
    }

    /**
     * Display a listing of the exercises.
     */
    public function index()
    {
        $exercises = Exercise::all();
        return view('exercises.index', compact('exercises'));
    }

    /**
     * Show the form for creating a new exercise.
     */
    public function create()
    {
        return view('exercises.create');
    }

    /**
     * Store a newly created exercise in the database.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'equipment_used' => 'nullable|string',
            'rest_period' => 'nullable|integer',
            'difficulty' => 'required|string',
            'target_body_part' => 'required|string',
        ]);

        Exercise::create($request->all());

        return redirect()->route('exercises.index')->with('success', 'Exercise added successfully.');
    }

    /**
     * Show the form for editing the specified exercise.
     */
    public function edit($id)
    {
        $exercise = Exercise::findOrFail($id);
        return view('exercises.edit', compact('exercise'));
    }

    /**
     * Update the specified exercise in the database.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'equipment_used' => 'nullable|string',
            'rest_period' => 'nullable|integer',
            'difficulty' => 'required|string',
            'target_body_part' => 'required|string',
        ]);

        $exercise = Exercise::findOrFail($id);
        $exercise->update($request->all());

        return redirect()->route('exercises.index')->with('success', 'Exercise updated successfully.');
    }

    /**
     * Remove the specified exercise from the database.
     */
    public function destroy($id)
    {
        $exercise = Exercise::findOrFail($id);
        $exercise->delete();

        return redirect()->route('exercises.index')->with('success', 'Exercise deleted successfully.');
    }
}




