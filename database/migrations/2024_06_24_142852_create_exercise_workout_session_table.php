<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateExerciseWorkoutSessionTable extends Migration
{
    public function up()
    {
        Schema::create('exercise_workout_session', function (Blueprint $table) {
            $table->id();
            $table->foreignId('workout_session_id')->constrained()->onDelete('cascade');
            $table->foreignId('exercise_id')->constrained()->onDelete('cascade');
            $table->integer('set_number');
            $table->integer('reps');
            $table->float('weight');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('exercise_workout_session');
    }
}

