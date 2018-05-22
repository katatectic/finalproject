<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    protected $table = 'users';

    public function articles()
    {
        return $this->hasMany('App\Article'); // один пользователь много статей
    }
	public function events() {
        return $this->hasMany('App\Event');
    }

    public function comments()
    {
        return $this->hasMany('App\Comment'); // один пользователь много комментариев
    }

    public function studentsClasses()
    {
        return $this->belongsToMany('App\StudentClass'); // один пользователь много классов
    }
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
       'surname','name','middle_name', 'email','phone','avatar','password', 
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
}
