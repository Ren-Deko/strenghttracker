<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWorkoutSessionsTable extends Migration
{
    public function up()
    {
        Schema::create('workout_sessions', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('workout_type_id');
            $table->date('workout_date'); // Ensure this is a date type
            $table->integer('duration')->nullable();
            $table->string('intensity')->nullable();
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('workout_type_id')->references('id')->on('workout_types')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('workout_sessions');
    }
}

