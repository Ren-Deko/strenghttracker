<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class WorkoutSessionsSeeder extends Seeder
{
    public function run()
    {
        DB::table('workout_sessions')->insert([
            ['workout_type_id' => 1, 'user_id' => 1, 'workout_date' => now(), 'duration' => 60, 'intensity' => 'Medium', 'created_at' => now(), 'updated_at' => now()],
            // Add more workout sessions here
        ]);
    }
}

