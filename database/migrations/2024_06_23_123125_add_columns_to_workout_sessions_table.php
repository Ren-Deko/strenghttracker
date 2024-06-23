<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnsToWorkoutSessionsTable extends Migration
{
    public function up()
    {
        Schema::table('workout_sessions', function (Blueprint $table) {
            // Add the necessary columns
            $table->dateTime('workout_date')->nullable()->after('user_id');
            $table->integer('duration')->nullable()->after('workout_date');
            $table->string('intensity')->nullable()->after('duration');
        });
    }

    public function down()
    {
        Schema::table('workout_sessions', function (Blueprint $table) {
            // Drop the newly added columns if necessary
            $table->dropColumn(['workout_date', 'duration', 'intensity']);
        });
    }
}

