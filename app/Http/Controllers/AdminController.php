<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Article;
use App\Event;
use App\User;
use App\Slider;
use App\Image;
use App\Album;

class AdminController extends Controller {

    public function index() {
     return view('admin.admin');
    }

}
