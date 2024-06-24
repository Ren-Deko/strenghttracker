<?php

namespace App\Policies;

use App\Models\User;
use App\Models\WorkoutType;
use Illuminate\Auth\Access\HandlesAuthorization;

class WorkoutTypePolicy
{
    use HandlesAuthorization;

    public function view(User $user, WorkoutType $workoutType)
    {
        return $workoutType->user_id === null || $workoutType->user_id === $user->id;
    }

    public function update(User $user, WorkoutType $workoutType)
    {
        return $workoutType->user_id === $user->id;
    }

    public function delete(User $user, WorkoutType $workoutType)
    {
        return $workoutType->user_id === $user->id;
    }
}



