<?php

// database/migrations/yyyy_mm_dd_hhmmss_create_workout_sessions_table.php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWorkoutSessionsTable extends Migration
{
    public function up()
    {
        Schema::create('workout_sessions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('workout_type_id')->constrained();
            $table->foreignId('user_id')->constrained();
            $table->date('workout_date');
            $table->integer('duration')->nullable();
            $table->string('intensity')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('workout_sessions');
    }
}

