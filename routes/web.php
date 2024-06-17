<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ExerciseController;
use App\Http\Controllers\WorkoutController;
use App\Http\Controllers\PredefinedWorkoutController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;

// Profiles
Route::resource('profiles', ProfileController::class);

// Exercises
Route::resource('exercises', ExerciseController::class);

// Workouts
Route::resource('workouts', WorkoutController::class);

// Predefined Workouts
Route::resource('predefined_workouts', PredefinedWorkoutController::class);

// Home
Route::get('/', [HomeController::class, 'index'])->name('home');
