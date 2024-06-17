<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ExerciseController;
use App\Http\Controllers\WorkoutController;
use App\Http\Controllers\PredefinedWorkoutController;

// Profiles
Route::resource('profiles', ProfileController::class);

// Exercises
Route::resource('exercises', ExerciseController::class);

// Workouts
Route::resource('workouts', WorkoutController::class);

// Predefined Workouts
Route::resource('predefined_workouts', PredefinedWorkoutController::class);


