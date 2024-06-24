<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWorkoutDetailsTable extends Migration
{
    public function up()
    {
        Schema::create('workout_details', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('workout_session_id');
            $table->unsignedBigInteger('exercise_id');
            $table->integer('set_number');
            $table->integer('reps');
            $table->decimal('weight', 8, 2);
            $table->timestamps();

            $table->foreign('workout_session_id')->references('id')->on('workout_sessions')->onDelete('cascade');
            $table->foreign('exercise_id')->references('id')->on('exercises')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('workout_details');
    }
}
