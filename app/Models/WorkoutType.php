<?php

// app/Models/WorkoutType.php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class WorkoutType extends Model
{
    protected $fillable = ['name'];

    public function workout_sessions()
    {
        return $this->hasMany(WorkoutSession::class);
    }

    public function exercises()
    {
        return $this->belongsToMany(Exercise::class, 'exercise_workout_type');
    }
}


