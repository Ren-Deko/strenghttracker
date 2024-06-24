<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ExerciseWorkoutTypeSeeder extends Seeder
{
    public function run()
    {
        DB::table('exercise_workout_type')->insert([
            // Push Workout
            ['exercise_id' => 1, 'workout_type_id' => 1], // Bench Press in Push Workout
            ['exercise_id' => 2, 'workout_type_id' => 1], // Incline Bench Press in Push Workout
            ['exercise_id' => 3, 'workout_type_id' => 1], // Chest Fly in Push Workout
       
            // Pull Workout
            ['exercise_id' => 4, 'workout_type_id' => 2], // Pull Up in Pull Workout
            ['exercise_id' => 5, 'workout_type_id' => 2], // Lat Pulldown in Pull Workout
            ['exercise_id' => 6, 'workout_type_id' => 2], // Bent Over Row in Pull Workout
            ['exercise_id' => 19, 'workout_type_id' => 2], // Bicep Curl in Pull Workout
            ['exercise_id' => 20, 'workout_type_id' => 2], // Hammer Curl in Pull Workout
           
            // Legs Workout
            ['exercise_id' => 7, 'workout_type_id' => 3], // Squat in Legs Workout
            ['exercise_id' => 8, 'workout_type_id' => 3], // Leg Press in Legs Workout
            ['exercise_id' => 9, 'workout_type_id' => 3], // Lunge in Legs Workout
            ['exercise_id' => 10, 'workout_type_id' => 3], // Calf Raise in Legs Workout
            ['exercise_id' => 11, 'workout_type_id' => 3], // Seated Calf Raise in Legs Workout
            ['exercise_id' => 12, 'workout_type_id' => 3], // Hip Thrust in Legs Workout
            ['exercise_id' => 13, 'workout_type_id' => 3], // Glute Bridge in Legs Workout
        ]);
    }
}




