<?php


namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ExercisesTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('exercises')->insert([
            // Chest exercises
            ['name' => 'Bench Press', 'description' => 'Bench Press description', 'equipment_used' => 'Barbell', 'rest_period' => '60 seconds', 'difficulty' => 'Medium', 'target_body_part' => 'Chest', 'user_id' => null, 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Incline Bench Press', 'description' => 'Incline Bench Press description', 'equipment_used' => 'Barbell', 'rest_period' => '60 seconds', 'difficulty' => 'Medium', 'target_body_part' => 'Chest', 'user_id' => null, 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Chest Fly', 'description' => 'Chest Fly description', 'equipment_used' => 'Dumbbell', 'rest_period' => '60 seconds', 'difficulty' => 'Medium', 'target_body_part' => 'Chest', 'user_id' => null, 'created_at' => now(), 'updated_at' => now()],

            // Back exercises
            ['name' => 'Pull Up', 'description' => 'Pull Up description', 'equipment_used' => 'Body', 'rest_period' => '60 seconds', 'difficulty' => 'Hard', 'target_body_part' => 'Back', 'user_id' => null, 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Lat Pulldown', 'description' => 'Lat Pulldown description', 'equipment_used' => 'Machine', 'rest_period' => '60 seconds', 'difficulty' => 'Medium', 'target_body_part' => 'Back', 'user_id' => null, 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Bent Over Row', 'description' => 'Bent Over Row description', 'equipment_used' => 'Barbell', 'rest_period' => '60 seconds', 'difficulty' => 'Hard', 'target_body_part' => 'Back', 'user_id' => null, 'created_at' => now(), 'updated_at' => now()],

            // Quads exercises
            ['name' => 'Squat', 'description' => 'Squat description', 'equipment_used' => 'Barbell', 'rest_period' => '90 seconds', 'difficulty' => 'Hard', 'target_body_part' => 'Quads', 'user_id' => null, 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Leg Press', 'description' => 'Leg Press description', 'equipment_used' => 'Machine', 'rest_period' => '90 seconds', 'difficulty' => 'Medium', 'target_body_part' => 'Quads', 'user_id' => null, 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Lunge', 'description' => 'Lunge description', 'equipment_used' => 'Dumbbell', 'rest_period' => '90 seconds', 'difficulty' => 'Medium', 'target_body_part' => 'Quads', 'user_id' => null, 'created_at' => now(), 'updated_at' => now()],

            // Ankle exercises
            ['name' => 'Calf Raise', 'description' => 'Calf Raise description', 'equipment_used' => 'Body', 'rest_period' => '60 seconds', 'difficulty' => 'Easy', 'target_body_part' => 'Ankle', 'user_id' => null, 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Seated Calf Raise', 'description' => 'Seated Calf Raise description', 'equipment_used' => 'Machine', 'rest_period' => '60 seconds', 'difficulty' => 'Easy', 'target_body_part' => 'Ankle', 'user_id' => null, 'created_at' => now(), 'updated_at' => now()],

            // Glutes exercises
            ['name' => 'Hip Thrust', 'description' => 'Hip Thrust description', 'equipment_used' => 'Barbell', 'rest_period' => '90 seconds', 'difficulty' => 'Medium', 'target_body_part' => 'Glutes', 'user_id' => null, 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Glute Bridge', 'description' => 'Glute Bridge description', 'equipment_used' => 'Body', 'rest_period' => '60 seconds', 'difficulty' => 'Easy', 'target_body_part' => 'Glutes', 'user_id' => null, 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Cable Kickback', 'description' => 'Cable Kickback description', 'equipment_used' => 'Cable', 'rest_period' => '60 seconds', 'difficulty' => 'Medium', 'target_body_part' => 'Glutes', 'user_id' => null, 'created_at' => now(), 'updated_at' => now()],

            // Biceps exercises
            ['name' => 'Bicep Curl', 'description' => 'Bicep Curl description', 'equipment_used' => 'Dumbbell', 'rest_period' => '60 seconds', 'difficulty' => 'Easy', 'target_body_part' => 'Biceps', 'user_id' => null, 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Hammer Curl', 'description' => 'Hammer Curl description', 'equipment_used' => 'Dumbbell', 'rest_period' => '60 seconds', 'difficulty' => 'Easy', 'target_body_part' => 'Biceps', 'user_id' => null, 'created_at' => now(), 'updated_at' => now()],

            // Forearms exercises
            ['name' => 'Wrist Curl', 'description' => 'Wrist Curl description', 'equipment_used' => 'Dumbbell', 'rest_period' => '60 seconds', 'difficulty' => 'Easy', 'target_body_part' => 'Forearms', 'user_id' => null, 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Reverse Curl', 'description' => 'Reverse Curl description', 'equipment_used' => 'Barbell', 'rest_period' => '60 seconds', 'difficulty' => 'Easy', 'target_body_part' => 'Forearms', 'user_id' => null, 'created_at' => now(), 'updated_at' => now()],

            // Shoulders exercises
            ['name' => 'Shoulder Press', 'description' => 'Shoulder Press description', 'equipment_used' => 'Dumbbell', 'rest_period' => '60 seconds', 'difficulty' => 'Medium', 'target_body_part' => 'Shoulders', 'user_id' => null, 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Lateral Raise', 'description' => 'Lateral Raise description', 'equipment_used' => 'Dumbbell', 'rest_period' => '60 seconds', 'difficulty' => 'Medium', 'target_body_part' => 'Shoulders', 'user_id' => null, 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Front Raise', 'description' => 'Front Raise description', 'equipment_used' => 'Dumbbell', 'rest_period' => '60 seconds', 'difficulty' => 'Medium', 'target_body_part' => 'Shoulders', 'user_id' => null, 'created_at' => now(), 'updated_at' => now()],

            // Triceps exercises
            ['name' => 'Tricep Dip', 'description' => 'Tricep Dip description', 'equipment_used' => 'Body', 'rest_period' => '60 seconds', 'difficulty' => 'Hard', 'target_body_part' => 'Triceps', 'user_id' => null, 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Tricep Extension', 'description' => 'Tricep Extension description', 'equipment_used' => 'Dumbbell', 'rest_period' => '60 seconds', 'difficulty' => 'Easy', 'target_body_part' => 'Triceps', 'user_id' => null, 'created_at' => now(), 'updated_at' => now()]
        ]);
    }
}
