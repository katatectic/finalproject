<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class StudentClass extends Model
{
    public $timestamps = false;

    protected $guarded = [];

    protected $table = 'students_classes';

    public function user() {
        return $this->belongsToMany('App\User');
    }
}
