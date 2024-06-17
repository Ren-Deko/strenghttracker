<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddMoreFieldsToWorkoutsTable extends Migration
{
    public function up()
    {
        Schema::table('workouts', function (Blueprint $table) {
            $table->integer('duration')->nullable(); // duration in minutes
            $table->string('intensity')->nullable();
        });
    }

    public function down()
    {
        Schema::table('workouts', function (Blueprint $table) {
            $table->dropColumn(['duration', 'intensity']);
        });
    }
}


