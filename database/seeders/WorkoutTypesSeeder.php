<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class WorkoutTypesSeeder extends Seeder
{
    public function run()
    {
        DB::table('workout_types')->insert([
            ['id' => 1, 'name' => 'Push Workout', 'user_id' => null, 'created_at' => now(), 'updated_at' => now()],
            ['id' => 2, 'name' => 'Pull Workout', 'user_id' => null, 'created_at' => now(), 'updated_at' => now()],
            ['id' => 3, 'name' => 'Legs Workout', 'user_id' => null, 'created_at' => now(), 'updated_at' => now()],
        ]);
    }
}

