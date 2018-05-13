<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table)
        {
            $table->increments('id');
            $table->string('surname');
            $table->string('name');
            $table->string('middle_name');
            $table->string('email', 200)->unique();
            $table->decimal('phone', 13, 0);
            $table->string('password');
            $table->tinyInteger('role')->default(4);
            $table->string('appointment', 100)->nullable()->comment('Должность внутри комитета');
            $table->string('your_child', 120)->nullable()->comment('ФИО ребёнка');
            $table->string('avatar')->default('storage/app/avatars/default_avatar.jpg');
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
