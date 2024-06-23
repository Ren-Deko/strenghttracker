<?php
// app/Models/Exercise.php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Exercise extends Model
{

    protected $fillable = [
        'name',
        'description',
        'equipment_used',
        'rest_period',
        'difficulty',
        'target_body_part',
    ];
    public function workout_sessions()
    {
        return $this->belongsToMany(WorkoutSession::class, 'exercise_workout')->withPivot('sets', 'reps', 'weight');
    }

    public function workout_types()
    {
        return $this->belongsToMany(WorkoutType::class, 'exercise_workout_type');
    }


}


