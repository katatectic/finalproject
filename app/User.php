<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Contracts\Auth\CanResetPassword;
use Cache;
use Carbon\Carbon;

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
    public function reports()
    {
        return $this->hasMany('App\Report'); // один пользователь много отчетов
    }
	
	public function age()
    {
      return Carbon::parse($this->attributes['birthday'])->age;
    }
	
	public function isOnline()
    {
        return Cache::has('user-is-online-'. $this->id);
    }
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
       'surname','name','middle_name', 'email','phone','avatar','password', 'role','sex','birthday'
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
