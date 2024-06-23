<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WorkoutSession extends Model
{
    use HasFactory;

    protected $fillable = ['workout_type_id', 'user_id', 'workout_date', 'duration', 'intensity'];

    public function workoutType()
    {
        return $this->belongsTo(WorkoutType::class);
    }

    public function exercises()
    {
        return $this->belongsToMany(Exercise::class, 'exercise_workout_details')
                    ->withPivot('set_number', 'reps', 'weight')
                    ->withTimestamps();
    }
}





