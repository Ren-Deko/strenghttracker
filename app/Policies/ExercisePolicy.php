<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Exercise;
use Illuminate\Auth\Access\HandlesAuthorization;

class ExercisePolicy
{
    use HandlesAuthorization;

    public function view(User $user, Exercise $exercise)
    {
        // Only allow viewing if the exercise is shared or belongs to the user
        return $exercise->isShared() || $exercise->user_id == $user->id;
    }

    public function update(User $user, Exercise $exercise)
    {
        // Only allow updating if the exercise belongs to the user
        return $exercise->user_id == $user->id;
    }

    public function delete(User $user, Exercise $exercise)
    {
        // Only allow deleting if the exercise belongs to the user
        return $exercise->user_id == $user->id;
    }
}


