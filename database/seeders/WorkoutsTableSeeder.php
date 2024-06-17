<?php

use Illuminate\Database\Seeder;
use App\Models\Workout;

class WorkoutsTableSeeder extends Seeder
{
    public function run()
    {
        Workout::create([
            'user_id' => 1,
            'workout_date' => '2024-06-15 07:00:00',
            'duration' => 60,
            'intensity' => 'High',
        ]);

        Workout::create([
            'user_id' => 2,
            'workout_date' => '2024-06-15 09:30:00',
            'duration' => 45,
            'intensity' => 'Medium',
        ]);
    }
}
