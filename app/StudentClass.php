<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class StudentClass extends Model
{
    public $timestamps = false;
    protected $guarded = [];
    protected $table = 'studentClass';
}
