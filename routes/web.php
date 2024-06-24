<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ExerciseController;
use App\Http\Controllers\WorkoutController;

use App\Http\Controllers\WorkoutSessionController;
use App\Http\Controllers\DashboardController;


Route::get('/', function () {
    return view('welcome');
});


Route::resource('exercises', ExerciseController::class);
Route::get('exercises/{id}/edit', [ExerciseController::class, 'edit'])->name('exercises.edit')->middleware('auth');
Route::put('exercises/{id}', [ExerciseController::class, 'update'])->name('exercises.update')->middleware('auth');
Route::delete('exercises/{id}', [ExerciseController::class, 'destroy'])->name('exercises.destroy')->middleware('auth');


// Workout Session Routes
Route::middleware(['auth'])->group(function () {
    Route::get('/workout_sessions', [WorkoutSessionController::class, 'index'])->name('workout_sessions.index');
    Route::post('/workout_sessions', [WorkoutSessionController::class, 'store'])->name('workout_sessions.store');
    Route::get('/workout_sessions/{id}', [WorkoutSessionController::class, 'show'])->name('workout_sessions.show');
    Route::get('/workout_sessions/compare', [WorkoutSessionController::class, 'compare'])->name('workout_sessions.compare');
    Route::post('/workout_sessions/compare', [WorkoutSessionController::class, 'compare'])->name('workout_sessions.compare_results');
});

Route::get('/dashboard/max-weights', [DashboardController::class, 'maxWeights'])->name('dashboard.max_weights');

Route::get('/workouts/compare', [WorkoutSessionController::class, 'showCompareForm'])->name('workouts.compare.form');
Route::get('/workouts/compare/results', [WorkoutSessionController::class, 'compareWorkouts'])->name('workouts.compare');
Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('/dashboard/max_weights', [DashboardController::class, 'maxWeights'])->name('dashboard.max_weights');
});


Route::middleware(['auth'])->group(function () {
    Route::get('/workouts', [WorkoutController::class, 'index'])->name('workouts.index');
    Route::post('/workouts', [WorkoutController::class, 'store'])->name('workouts.store');
    Route::get('/workouts/{workoutType}/exercises', [WorkoutController::class, 'showWorkout'])->name('workouts.showWorkout');
    Route::post('/workouts/{workoutType}/add-exercise', [WorkoutController::class, 'addExercise'])->name('workouts.addExercise');
    Route::delete('/workouts/{workoutType}/remove-exercise/{exercise}', [WorkoutController::class, 'removeExercise'])->name('workouts.removeExercise');
    Route::get('/workouts/{workoutType}/start', [WorkoutController::class, 'startWorkout'])->name('workouts.startWorkout');
    Route::post('/workouts/{workoutType}/save-session', [WorkoutController::class, 'saveWorkoutSession'])->name('workouts.saveWorkoutSession');
    Route::get('/workout-sessions', [WorkoutController::class, 'showWorkoutSessions'])->name('workouts.showWorkoutSessions');
    Route::delete('/workouts/{workoutType}', [WorkoutController::class, 'destroy'])->name('workouts.destroy');
});

Auth::routes();


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
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
