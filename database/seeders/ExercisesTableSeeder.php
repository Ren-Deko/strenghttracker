<?php

use Illuminate\Database\Seeder;
use App\Models\Exercise;

class ExercisesTableSeeder extends Seeder
{
    public function run()
    {
        Exercise::create([
            'name' => 'Bench Press',
            'description' => 'Flat bench press for chest muscle development.',
            'equipment_used' => 'Bench, Barbell',
            'rest_period' => 90,
            'difficulty' => 'Intermediate',
            'target_body_part' => 'Chest',
        ]);

        Exercise::create([
            'name' => 'Squat',
            'description' => 'Full body exercise that targets legs and core.',
            'equipment_used' => 'Squat Rack',
            'rest_period' => 120,
            'difficulty' => 'Hard',
            'target_body_part' => 'Legs, Core',
        ]);
    }
}



