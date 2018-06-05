<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNewsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('news', function (Blueprint $table)
        {
            $table->increments('id');
            $table->string('title', 300);
            $table->dateTime('date')->nullable();
            $table->string('photo', 300)->nullable();
            $table->string('content', 15000)->nullable();
            $table->text('description', 1000)->nullable();
            $table->integer('user_id')->unsigned()->nullable();
            $table->foreign('user_id')->references('id')->on('users');
            $table->integer('student_class_id')->unsigned()->nullable();
            $table->foreign('student_class_id')->references('id')->on('students_classes')->onDelete('SET NULL');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('news');
    }
}
