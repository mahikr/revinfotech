<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Student extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('student', function (Blueprint $table) {
            $table->bigIncrements('student_id');
            $table->string('name');
            $table->string('father_name')->nullable();
            $table->string('class_studying')->nullable();
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
        Schema::dropIfExists('student');

    }
}
