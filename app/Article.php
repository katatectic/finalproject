<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    protected $table = 'news';

    /*Relations*/

    public $fillable = ['title', 'user_id', 'event_date', 'content', 'photo'];

    public function comments()
    {
        return $this->hasMany('App\Comment'); // одна статья имеет много комментариев
    }

    public function user()
    {
        return $this->belongsTo('App\User'); // одна статья принадлежит одному пользователю
    }
}
