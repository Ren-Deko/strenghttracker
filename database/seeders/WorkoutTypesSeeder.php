<?php

// database/seeders/WorkoutTypesSeeder.php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\WorkoutType;

class WorkoutTypesSeeder extends Seeder
{
    public function run()
    {
        $workoutTypes = ['Push', 'Pull', 'Legs'];

        foreach ($workoutTypes as $type) {
            WorkoutType::create(['name' => $type]);
        }
    }
}


