<?php

use Illuminate\Database\Seeder;
use App\Models\PredefinedWorkout;

class PredefinedWorkoutsTableSeeder extends Seeder
{
    public function run()
    {
        PredefinedWorkout::create([
            'name' => 'Beginner Full Body',
            'description' => 'A workout plan for fitness starters',
        ]);

        PredefinedWorkout::create([
            'name' => 'Advanced Strength',
            'description' => 'High intensity for experienced lifters',
        ]);
    }
}

