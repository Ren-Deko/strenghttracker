<?php

namespace App\Http\Controllers;

use App\Models\PredefinedWorkout;
use Illuminate\Http\Request;

class PredefinedWorkoutController extends Controller
{
    /**
     * Display a listing of predefined workouts.
     */
    public function index()
    {
        $predefinedWorkouts = PredefinedWorkout::all();
        return view('predefined_workouts.index', compact('predefinedWorkouts'));
    }

    /**
     * Show the form for creating a new predefined workout.
     */
    public function create()
    {
        return view('predefined_workouts.create');
    }

    /**
     * Store a newly created predefined workout in storage.
     * 
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'total_exercises' => 'required|integer',
            'estimated_duration' => 'required|integer',
            'difficulty' => 'required|string'
        ]);

        PredefinedWorkout::create($request->all());
        return redirect()->route('predefined_workouts.index')->with('success', 'Predefined workout created successfully.');
    }

    /**
     * Display the specified predefined workout.
     * 
     * @param  \App\Models\PredefinedWorkout  $predefinedWorkout
     */
    public function show(PredefinedWorkout $predefinedWorkout)
    {
        return view('predefined_workouts.show', compact('predefinedWorkout'));
    }

    /**
     * Show the form for editing the specified predefined workout.
     * 
     * @param  \App\Models\PredefinedWorkout  $predefinedWorkout
     */
    public function edit(PredefinedWorkout $predefinedWorkout)
    {
        return view('predefined_workouts.edit', compact('predefinedWorkout'));
    }

    /**
     * Update the specified predefined workout in storage.
     * 
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\PredefinedWorkatch each step, make it correct, adjust as necessary.'
     */
    public function update(Request $request, PredefinedWorkout $predefinedWorkout)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'total_exercises' => 'required|integer',
            'estimated_duration' => 'required|integer',
            'difficulty' => 'required|string'
        ]);

        $predefinedWorkout->update($request->all());
        return redirect()->route('predefined_workouts.index')->with('success', 'Predefined workout updated successfully.');
    }

    /**
     * Remove the specified predefined workout from storage.
     * 
     * @param  \App\Models\PredefinedWorkout  $predefinedWorkout
     */
    public function destroy(PredefinedWorkout $predefinedWorkout)
    {
        $predefinedWorkout->delete();
        return redirect()->route('predefined_workouts.index')->with('success', 'Predefined workout deleted successfully.');
    }
}

