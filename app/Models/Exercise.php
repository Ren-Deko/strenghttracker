<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Exercise extends Model
{
    protected $fillable = [
        'name', 'description', 'equipment_used', 'rest_period', 'difficulty', 'target_body_part'
    ];

    public function workouts()
    {
        return $this->belongsToMany(Workout::class, 'exercise_workout')
                    ->withPivot('sets', 'reps', 'weight')
                    ->withTimestamps();
    }

    public function predefinedWorkouts()
    {
        return $this->belongsToMany(PredefinedWorkout::class, 'predefined_workout_exercise');
    }
}

