<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;  // Ensure DB is imported


class ExerciseSeeder extends Seeder
{
    public function run()
    {
        $exercises = [
            ['Chest', 'Bench Press', 'Barbell', 120, 'Medium', 'Barbell bench press for building chest muscle'],
            ['Chest', 'Chest Fly', 'Dumbbell', 90, 'Easy', 'Dumbbell flyes to stretch and contract chest muscles'],
            ['Chest', 'Push Up', 'Body', 60, 'Easy', 'Bodyweight exercise targeting the chest'],
            ['Shoulder', 'Military Press', 'Barbell', 90, 'Hard', 'Overhead press to build shoulder strength'],
            ['Shoulder', 'Lateral Raise', 'Dumbbell', 60, 'Medium', 'Side lateral raises to target the deltoids'],
            ['Shoulder', 'Shrugs', 'Barbell', 60, 'Easy', 'Shrugs for building trap muscles'],
            ['Triceps', 'Tricep Dip', 'Body', 90, 'Medium', 'Bodyweight exercise for triceps'],
            ['Triceps', 'Skull Crusher', 'Barbell', 90, 'Medium', 'Lying tricep press with a barbell'],
            ['Triceps', 'Tricep Extension', 'Dumbbell', 60, 'Easy', 'Dumbbell extension for triceps'],
            ['Quads', 'Squat', 'Barbell', 120, 'Hard', 'Barbell back squats for leg strength'],
            ['Quads', 'Leg Press', 'Machine', 120, 'Medium', 'Machine leg press for quadriceps'],
            ['Quads', 'Lunges', 'Dumbbell', 90, 'Medium', 'Lunges with dumbbells for leg workout'],
            ['Hamstrings', 'Deadlift', 'Barbell', 180, 'Hard', 'Barbell deadlift targeting hamstrings and back'],
            ['Hamstrings', 'Leg Curl', 'Machine', 90, 'Medium', 'Machine leg curls for hamstrings'],
            ['Hamstrings', 'Glute Bridge', 'Body', 60, 'Easy', 'Bodyweight exercise targeting hamstrings and glutes'],
            ['Back', 'Pull Up', 'Body', 60, 'Hard', 'Bodyweight pull-ups for back strength'],
            ['Back', 'Row', 'Barbell', 90, 'Medium', 'Barbell rows to strengthen the back'],
            ['Back', 'Lat Pull Down', 'Machine', 90, 'Medium', 'Machine lat pull-downs for back width'],
            ['Biceps', 'Bicep Curl', 'Dumbbell', 60, 'Easy', 'Dumbbell curls for bicep growth'],
            ['Biceps', 'Hammer Curl', 'Dumbbell', 60, 'Easy', 'Hammer curls for biceps and forearms'],
            ['Forearms', 'Wrist Curl', 'Barbell', 60, 'Easy', 'Wrist curls to build forearm strength'],
            ['Forearms', 'Reverse Curl', 'Barbell', 60, 'Medium', 'Reverse curls to target the forearms and biceps']
        ];

        foreach ($exercises as $exercise) {
            DB::table('exercises')->insert([
                'name' => $exercise[1],
                'description' => $exercise[5],
                'equipment_used' => $exercise[2],
                'rest_period' => $exercise[3],
                'difficulty' => $exercise[4],
                'target_body_part' => $exercise[0],
                'created_at' => now(),
                'updated_at' => now()
            ]);
        }
    }
}

