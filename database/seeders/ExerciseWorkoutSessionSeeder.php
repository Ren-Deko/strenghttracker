<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ExerciseWorkoutSessionSeeder extends Seeder
{
    public function run()
    {
        DB::table('exercise_workout_session')->insert([
            ['workout_session_id' => 1, 'exercise_id' => 1, 'set_number' => 1, 'reps' => 10, 'weight' => 100, 'created_at' => now(), 'updated_at' => now()],
            // Add more exercise workout sessions here
        ]);
    }
}

