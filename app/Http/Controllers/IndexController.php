<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Article;
use App\Event;
use App\User;

class IndexController extends Controller {

    public $puginNewsMain = 3; //количество новостей на главной
    public $puginEventsMain = 3; //количество событий на главной

    public function getMain() {
        $news = Article::orderby('id', 'desc')->paginate($this->puginNewsMain);
        $events = Event::orderby('id', 'desc')->paginate($this->puginEventsMain);
        return view('welcome')->with(['news' => $news, 'events' => $events]);
    }

}
