<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddUserIdToWorkoutSessions extends Migration
{
    public function up()
    {
        Schema::table('workout_sessions', function (Blueprint $table) {
            $table->foreignId('user_id')->after('workout_type_id')->constrained()->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::table('workout_sessions', function (Blueprint $table) {
            $table->dropForeign(['user_id']);
            $table->dropColumn('user_id');
        });
    }
}

