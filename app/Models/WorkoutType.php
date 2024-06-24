<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class WorkoutType extends Model
{
    use HasFactory;

    
    protected $fillable = ['name', 'user_id'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function exercises()
    {
        return $this->belongsToMany(Exercise::class, 'exercise_workout_type');
    }

    public function scopeShared($query)
    {
        return $query->whereNull('user_id');
    }

    public function scopeUserSpecific($query)
    {
        return $query->where('user_id', Auth::id());
    }
    public function workoutSessions()
    {
        return $this->hasMany(WorkoutSession::class);
    }
    

    
}






