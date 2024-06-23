<?php

// database/migrations/yyyy_mm_dd_hhmmss_create_exercise_workout_type_table.php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateExerciseWorkoutTypeTable extends Migration
{
    public function up()
    {
        Schema::create('exercise_workout_type', function (Blueprint $table) {
            $table->id();
            $table->foreignId('exercise_id')->constrained();
            $table->foreignId('workout_type_id')->constrained();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('exercise_workout_type');
    }
}

