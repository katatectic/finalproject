<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

//    public $roleNames = [1 => 'Администратор', 'Глава комитета', 'Участник комитета', 'Зарегестрированный пользователь'];

    public $defaultAvatar = 'default_avatar.jpg';

//    public function transition()
//    {
//        $transition = ceil((strtotime('now') - strtotime(date('Y',strtotime('now')).'-08-01'))/(60*60*24*365));
//        return $transition;
//    }
}
