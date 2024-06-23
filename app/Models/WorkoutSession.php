<?php

// app/Models/WorkoutSession.php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class WorkoutSession extends Model
{
    protected $fillable = ['workout_type_id', 'user_id', 'workout_date', 'duration', 'intensity'];

    public function workout_type()
    {
        return $this->belongsTo(WorkoutType::class);
    }

    public function exercises()
    {
        return $this->belongsToMany(Exercise::class, 'exercise_workout')->withPivot('sets', 'reps', 'weight');
    }
}

