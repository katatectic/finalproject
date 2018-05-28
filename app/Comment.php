<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $table = 'comments';
	
    /*Relations*/
	
    public function article()
    {
        return $this->belongsTo('App\Article'); // один комментарий принадлежит одной статье
    }
	public function event()
    {
        return $this->belongsTo('App\Event'); // один комментарий принадлежит одному событию
    }
    public function user()
    {
        return $this->belongsTo('App\User'); // один комментарий принадлежит одному пользователю
    }
    public function report()
    {
        return $this->belongsTo('App\Report'); // один комментарий принадлежит одному отчету
    }

}