<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEventsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('events', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title');
            $table->string('address', 500)->nullable();
            $table->date('event_date')->nullable();
            $table->string('photo', 300)->nullable();
            $table->string('description', 300)->nullable();
            $table->string('content', 15000)->nullable();
            $table->string('event_hours', 300)->nullable();
            $table->integer('user_id')->unsigned()->nullable();
            $table->foreign('user_id')->references('id')->on('users');
            $table->integer('student_class_id')->unsigned()->nullable();
            $table->foreign('student_class_id')->references('id')->on('students_classes');
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
        Schema::dropIfExists('events');
    }
}
