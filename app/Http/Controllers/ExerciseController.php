<?php

namespace App\Http\Controllers;

use App\Models\Exercise;
use Illuminate\Http\Request;

class ExerciseController extends Controller
{
    // Display a listing of exercises
    public function index()
    {
        $exercises = Exercise::all();
        return view('exercises.index', compact('exercises'));
    }

    // Show the form for creating a new exercise
    public function create()
    {
        return view('exercises.create');
    }

    // Store a newly created exercise in the database
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'equipment_used' => 'nullable|string',
            'rest_period' => 'nullable|integer',
            'difficulty' => 'nullable|string',
            'target_body_part' => 'nullable|string'
        ]);

        Exercise::create($request->all());
        return redirect()->route('exercises.index')->with('success', 'Exercise created successfully.');
    }

    // Display the specified exercise
    public function show(Exercise $exercise)
    {
        return view('exercises.show', compact('exercise'));
    }

    // Show the form for editing the specified exercise
    public function edit(Exercise $exercise)
    {
        return view('exercises.edit', compact('exercise'));
    }

    // Update the specified exercise in the database
    public function update(Request $request, Exercise $exercise)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'equipment_used' => 'nullable|string',
            'rest_period' => 'nullable|integer',
            'difficulty' => 'nullable|string',
            'target_body_part' => 'nullable|string'
        ]);

        $exercise->update($request->all());
        return redirect()->route('exercises.index')->with('success', 'Exercise updated successfully.');
    }

    // Remove the specified exercise from the database
    public function destroy(Exercise $exercise)
    {
        $exercise->delete();
        return redirect()->route('exercises.index')->with('success', 'Exercise deleted successfully.');
    }
}

