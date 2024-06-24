<?php
// app/Models/Exercise.php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Exercise extends Model
{

    use HasFactory;

    protected $fillable = ['name', 'description', 'equipment_used', 'rest_period', 'difficulty', 'target_body_part', 'user_id'];

    public function workout_sessions()
    {
        return $this->belongsToMany(WorkoutSession::class, 'exercise_workout')->withPivot('sets', 'reps', 'weight');
    }

    public function workoutTypes()
    {
        return $this->belongsToMany(WorkoutType::class, 'exercise_workout_type');
    }

    public function scopeShared($query)
    {
        return $query->whereNull('user_id');
    }

    public function scopeUserSpecific($query)
    {
        return $query->where('user_id', Auth::id());
    }

    public function isShared()
    {
        return $this->user_id === null;
    }
    public function workoutSessions()
    {
        return $this->belongsToMany(WorkoutSession::class, 'exercise_workout_details')
                    ->withPivot('set_number', 'reps', 'weight')
                    ->withTimestamps();
    }

}


