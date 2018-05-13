<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $table = 'comments';

    /*Relations*/

    public function article()
    {
        return $this->belongsTo('App\Article'); // одна статья много комментариев
    }

    public function user()
    {
        return $this->belongsTo('App\User'); // одна статья от одного автора
    }

}