<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ExerciseController;



Route::get('/', function () {
    return view('welcome');
});


Route::resource('exercises', ExerciseController::class);
Route::get('exercises/{id}/edit', [ExerciseController::class, 'edit'])->name('exercises.edit')->middleware('auth');
Route::put('exercises/{id}', [ExerciseController::class, 'update'])->name('exercises.update')->middleware('auth');
Route::delete('exercises/{id}', [ExerciseController::class, 'destroy'])->name('exercises.destroy')->middleware('auth');



use App\Http\Controllers\WorkoutController;

Route::resource('workouts', WorkoutController::class);
Route::get('workouts/{workoutType}/exercises', [WorkoutController::class, 'showWorkout'])->name('workouts.showWorkout');
Route::post('workouts/{workoutType}/exercises', [WorkoutController::class, 'addExercise'])->name('workouts.addExercise');
Route::delete('workouts/{workoutType}/exercises/{exercise}', [WorkoutController::class, 'removeExercise'])->name('workouts.removeExercise');
Route::get('workouts/{workoutType}/start', [WorkoutController::class, 'startWorkout'])->name('workouts.startWorkout');
Route::post('workouts/{workoutType}/start', [WorkoutController::class, 'saveWorkoutSession'])->name('workouts.saveWorkoutSession');
Route::get('workout_sessions', [WorkoutController::class, 'showWorkoutSessions'])->name('workouts.showWorkoutSessions');


// Make sure 'ProfileController' is used correctly in the route definition
Route::get('/profile', [ProfileController::class, 'index'])->name('profile.index')->middleware('auth');



Route::get('/', function () {
    return view('home');
});

Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard')->middleware('auth');






Route::get('/', function () {
    return view('home');
})->name('home');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

// Workouts routes
Route::resource('workouts', WorkoutController::class)->middleware('auth');

// Exercises routes
Route::resource('exercises', ExerciseController::class)->middleware('auth');

// Authentication routes provided by Breeze
require __DIR__.'/auth.php';