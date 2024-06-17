<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PredefinedWorkout extends Model
{
    protected $fillable = [
        'name', 'description'
    ];

    public function exercises()
    {
        return $this->belongsToMany(Exercise::class, 'predefined_workout_exercise')
                    ->withPivot('sets', 'reps', 'weight')
                    ->withTimestamps();
    }
}

