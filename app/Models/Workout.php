<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Workout extends Model
{
    protected $fillable = [
        'user_id', 'workout_date', 'duration', 'intensity'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function exercises()
    {
        return $this->belongsToMany(Exercise::class, 'exercise_workout')
                    ->withPivot('sets', 'reps', 'weight')
                    ->withTimestamps();
    }
}

