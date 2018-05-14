<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UsersStudentClass extends Model
{
    public $timestamps = false;
    protected $guarded = [];
    protected $table = 'users_studentClass';
}
