<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStudentClassTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('studentClass', function (Blueprint $table)
        {
            $table->increments('id');
            $table->string('letter_class', 2)->comment('литера класса');
            $table->smallInteger('start_year')->length(4)->comment('первый учебный год');
            $table->smallInteger('year_of_issue')->length(4)->comment('год выпуска');
            $table->boolean('fourth_class')->default(0)->comment('включён 4 класс');
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
        Schema::dropIfExists('studentClass');
    }
}
