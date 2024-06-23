<?php

// database/seeders/WorkoutSessionsSeeder.php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\WorkoutSession;
use App\Models\WorkoutType;
use App\Models\Exercise;
use Illuminate\Support\Facades\DB;

class WorkoutSessionsSeeder extends Seeder
{
    public function run()
    {
        $workoutTypes = WorkoutType::all();
        $exercises = Exercise::all();

        foreach ($workoutTypes as $type) {
            $session = WorkoutSession::create([
                'workout_type_id' => $type->id,
                'user_id' => 1, // Assuming a user with ID 1 for seeding
                'workout_date' => now(),
                'duration' => 60,
                'intensity' => 'Medium',
            ]);

            $session->exercises()->attach(
                $exercises->random(3)->pluck('id')->toArray(),
                [
                    'sets' => 3,
                    'reps' => 10,
                    'weight' => 50,
                ]
            );
        }
    }
}

