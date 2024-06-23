<?php

// database/migrations/yyyy_mm_dd_hhmmss_create_exercise_workout_table.php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateExerciseWorkoutTable extends Migration
{
    public function up()
    {
        Schema::create('exercise_workout', function (Blueprint $table) {
            $table->id();
            $table->foreignId('exercise_id')->constrained();
            $table->foreignId('workout_session_id')->constrained();
            $table->integer('sets')->default(0);
            $table->integer('reps')->default(0);
            $table->float('weight', 8, 2)->default(0.00);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('exercise_workout');
    }
}

