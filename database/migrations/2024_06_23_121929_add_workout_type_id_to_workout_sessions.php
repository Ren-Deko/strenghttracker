<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddWorkoutTypeIdToWorkoutSessions extends Migration
{
    public function up()
    {
        Schema::table('workout_sessions', function (Blueprint $table) {
            $table->foreignId('workout_type_id')->after('id')->constrained('workout_types')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::table('workout_sessions', function (Blueprint $table) {
            $table->dropColumn('workout_type_id');
        });
    }
}

