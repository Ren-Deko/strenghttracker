<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class WorkoutSession extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id', 'workout_type_id', 'workout_date', 'duration', 'intensity'
    ];

    protected $casts = [
        'workout_date' => 'datetime',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function workoutType()
    {
        return $this->belongsTo(WorkoutType::class);
    }

    public function workoutDetails()
    {
        return $this->hasMany(WorkoutDetail::class);
    }

    public function exercises()
    {
        return $this->belongsToMany(Exercise::class, 'workout_details', 'workout_session_id', 'exercise_id')
                    ->withPivot('set_number', 'reps', 'weight');
    }
}




