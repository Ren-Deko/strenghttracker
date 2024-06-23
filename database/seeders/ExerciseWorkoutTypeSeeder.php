<?php

// database/seeders/ExerciseWorkoutTypeSeeder.php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\WorkoutType;
use App\Models\Exercise;

class ExerciseWorkoutTypeSeeder extends Seeder
{
    public function run()
    {
        $workoutTypes = WorkoutType::all();
        $exercises = Exercise::all();

        foreach ($workoutTypes as $type) {
            $type->exercises()->attach(
                $exercises->random(5)->pluck('id')->toArray()
            );
        }
    }
}

