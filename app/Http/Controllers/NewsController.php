<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Article;

class NewsController extends Controller
{
    public $puginMain = 3; //количество новостей на главной
    public $puginNews = 10; //количество новостей на странице новостей
    
    public function getNewsMain()
    {
        $news = Article::orderby('id', 'desc')->paginate($this->puginMain);
        return view('welcome', ['news'=>$news]);
    }
    
     public function getNews()
    {
        $news = Article::orderby('id', 'desc')->paginate($this->puginNews);
        return view('news', ['news'=>$news]);
    }
    
    public function getArticle($id)
    {
        $article = Article::find($id);
        return view('article', ['article'=>$article]);
    }
    
     public function newsView() {
        return view('admin.news.newsform');
    }
}
