<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Exercise;
use Illuminate\Support\Facades\Auth;

class ExerciseController extends Controller
{
    public function index()
    {
        // Fetch exercises created by the user and shared exercises
        $exercises = Exercise::where('user_id', Auth::id())
                        ->orWhereNull('user_id')
                        ->get();

        return view('exercises.index', compact('exercises'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'equipment_used' => 'required|string',
            'rest_period' => 'required|integer',
            'difficulty' => 'required|string',
            'target_body_part' => 'required|string',
        ]);

        Exercise::create([
            'name' => $request->name,
            'description' => $request->description,
            'equipment_used' => $request->equipment_used,
            'rest_period' => $request->rest_period,
            'difficulty' => $request->difficulty,
            'target_body_part' => $request->target_body_part,
            'user_id' => Auth::id(),
        ]);

        return redirect()->route('exercises.index')->with('success', 'Exercise created successfully.');
    }

    public function edit(Exercise $exercise)
    {
        $this->authorize('update', $exercise);

        return view('exercises.edit', compact('exercise'));
    }

    public function update(Request $request, Exercise $exercise)
    {
        $this->authorize('update', $exercise);

        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'equipment_used' => 'required|string',
            'rest_period' => 'required|integer',
            'difficulty' => 'required|string',
            'target_body_part' => 'required|string',
        ]);

        $exercise->update($request->all());

        return redirect()->route('exercises.index')->with('success', 'Exercise updated successfully.');
    }

    public function destroy(Exercise $exercise)
    {
        $this->authorize('delete', $exercise);

        $exercise->delete();

        return redirect()->route('exercises.index')->with('success', 'Exercise deleted successfully.');
    }
}




