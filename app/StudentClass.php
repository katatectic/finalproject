<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class StudentClass extends Model
{
    public $timestamps = false;

    protected $guarded = [];

    protected $table = 'students_classes';

    public function user() {
        return $this->belongsToMany('App\User'); // много комитетов много пользователей
    }

    public function news()
    {
        return $this->hasMany('App\Article'); // один комитет много статей
    }

    public function events()
    {
        return $this->hasMany('App\Event'); // один комитет много событий
    }
}
