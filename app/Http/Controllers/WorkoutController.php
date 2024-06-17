<?php

namespace App\Http\Controllers;

use App\Models\Workout;
use Illuminate\Http\Request;

class WorkoutController extends Controller
{
    // Display a listing of workouts
    public function index()
    {
        $workouts = Workout::all();
        return view('workouts.index', compact('workouts'));
    }

    // Show the form for creating a new workout
    public function create()
    {
        return view('workouts.create');
    }

    // Store a newly created workout in the database
    public function store(Request $request)
    {
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'workout_date' => 'required|date',
            'duration' => 'nullable|integer',
            'intensity' => 'nullable|string'
        ]);

        Workout::create($request->all());
        return redirect()->route('workouts.index')->with('success', 'Workout created successfully.');
    }

    // Display the specified workout
    public function show(Workout $workout)
    {
        return view('workouts.show', compact('workout'));
    }

    // Show the form for editing the specified workout
    public function edit(Workout $workout)
    {
        return view('workouts.edit', compact('workout'));
    }

    // Update the specified workout in the database
    public function update(Request $request, Workout $workout)
    {
        $request->validate([
            'workout_date' => 'required|date',
            'duration' => 'nullable|integer',
            'intensity' => 'nullable|string'
        ]);

        $workout->update($request->all());
        return redirect()->route('workouts.index')->with('success', 'Workout updated successfully.');
    }

   // Remove the specified workout from the database
   public function destroy(Workout $workout)
   {
       $workout->delete();
       return redirect()->route('workouts.index')->with('success', 'Workout deleted successfully.');
   }
}


