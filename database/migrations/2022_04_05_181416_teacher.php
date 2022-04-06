<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Teacher extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('teacher', function (Blueprint $table) {
            $table->bigIncrements('teacher_id');
            $table->string('name')->nullable();
            $table->string('subject')->nullable();
            $table->string('class_teaching')->nullable();
            $table->string('school_name')->nullable();
            $table->string('phone')->nullable();
            $table->string('photo')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
        Schema::dropIfExists('teacher');
    }
}
