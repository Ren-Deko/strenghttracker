<?php

// database/migrations/yyyy_mm_dd_hhmmss_create_workout_types_table.php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWorkoutTypesTable extends Migration
{
    public function up()
    {
        Schema::create('workout_types', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('workout_types');
    }
}
