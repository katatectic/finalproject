<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddStatusToFeedbacks extends Migration
{
  public function up()
{
    Schema::table('feedbacks', function($table) {
        $table->tinyInteger('status')->default(1);
    });
}

  
    public function down()
    {
     
    }
}
