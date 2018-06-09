<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Report extends Model {

    protected $table = 'reports';
    public $fillable = ['date', 'content', 'user_id', 'student_class_id'];

    public function user() {
        return $this->belongsTo('App\User'); // один отчет одному пользователю
    }

    public function comments() {
        return $this->hasMany('App\Comment'); // один отчет много комментариев
    }

    public function checks() {

        return $this->hasMany('App\Check');
    }

    public function studentClass() {
        return $this->belongsTo('App\StudentClass'); // один отчёт один комитет
    }

}
