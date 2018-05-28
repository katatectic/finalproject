<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Report extends Model
{
    protected $table = 'reports';

    public $fillable = ['date', 'content', 'pay_check', 'user_id'];

    public function user() {
        return $this->belongsTo('App\User'); // один отчет одному пользователю
    }

    public function comments()
    {
        return $this->hasMany('App\Comment'); // один отчет много комментариев
    }
    
}
