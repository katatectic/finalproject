<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserStudentClass extends Model
{
    protected $table = 'users_studentClass';
    public $timestamps = false;
    protected $guarded = [];
}
