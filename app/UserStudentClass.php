<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserStudentClass extends Model
{
    protected $table = 'student_class_user';
    public $timestamps = false;
    protected $guarded = [];
}
