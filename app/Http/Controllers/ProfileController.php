<?php

namespace App\Http\Controllers;

use App\Models\Profile;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    // Display a listing of profiles
    public function index()
    {
        $profiles = Profile::all();
        return view('profiles.index', compact('profiles'));
    }

    // Show the form for creating a new profile
    public function create()
    {
        return view('profiles.create');
    }

    // Store a newly created profile in the database
    public function store(Request $request)
    {
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'first_name' => 'required|max:255',
            'last_name' => 'required|max:255',
            // Add validation for other fields
        ]);

        Profile::create($request->all());
        return redirect()->route('profiles.index')->with('success', 'Profile created successfully.');
    }

    // Display the specified profile
    public function show(Profile $profile)
    {
        return view('profiles.show', compact('profile'));
    }

    // Show the form for editing the specified profile
    public function edit(Profile $profile)
    {
        return view('profiles.edit', compact('profile'));
    }

    // Update the specified profile in the database
    public function update(Request $request, Profile $profile)
    {
        $request->validate([
            'first_name' => 'required|max:255',
            'last_name' => 'required|max:255',
            // Add validation for other fields
        ]);

        $profile->update($request->all());
        return redirect()->route('profiles.index')->with('success', 'Profile updated successfully.');
    }

    // Remove the specified profile from the database
    public function destroy(Profile $profile)
    {
        $profile->delete();
        return redirect()->route('profiles.index')->with('success', 'Profile deleted successfully.');
    }
}
