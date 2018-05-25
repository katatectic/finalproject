<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Article;
use App\User;
use DateTime;

class NewsController extends Controller {

    public $puginationNews = 5;

    public function index(Request $request) {
        $all = Article::orderBy('id', 'DESC')->paginate($this->puginationNews);
        return view('news', compact('all'));
    }

    public function article($id) {
        $article = Article::select()->where('id', $id)->first();
        return view('article', compact('article'));
    }

    public function adminNews() {
        $all = Article::orderBy('id', 'DESC')->paginate(10);
        $newsCount = Article::count();
        return view('admin.news.index', compact('all', 'newsCount'));
    }

    public function create() {
        return view('admin.news.create');
    }

    public function userNewsCreate() {
        return view('user.useraddnews');
    }

    public function store(Request $request) {
        if ($request->method() == 'POST') {
            $this->validate($request, [
                'title' => 'required',
                'date' => 'required',
                'content' => 'required',
                'photo' => 'required|image|max:2048',], [
                '*.required' => 'Поле не должно быть пустым',
                'photo.image' => 'Загруженный файл должен быть изображением',
                'photo.max' => 'Максимальный размер изображения=2048'
            ]);
            $data = $request->all();
            unset($data['__token']);
            $date = new DateTime();
            $data['date'] = $date->format('Y-m-d');
            if ($request->hasFile('photo')) {
                $data['photo'] = $this->addPhoto($request);
            };
            $create = Article::create($data);
            $id = $create->id;
            return redirect()->route('adminnews');
        }
        return view('admin.news.create');
    }

    public function addPhoto($request) {
        $file = $request->file('photo');
        $newfilename = rand(0, 100) . "." . $file->getClientOriginalExtension();
        $file->move(public_path() . '/images/news', $newfilename);
        return $newfilename;
    }

    public function destroy($id) {
        if (!is_numeric($id))
            return false;
        $article = Article::find($id);
        $img = $article->photo;
        if (is_file($img)) {
            unlink(public_path() . '/images/news/' . $img);
        }
        $article->delete();
        return redirect()->route('adminnews');
    }

    public function edit($id, Request $request) {
        if ($request->method() == "POST") {
            $this->validate($request, [
                'title' => 'required',
                'date' => 'required',
                'content' => 'required',
                'photo' => 'required|image|max:2048',], [
                '*.required' => 'Поле не должно быть пустым',
                'photo.image' => 'Загруженный файл должен быть изображением',
                'photo.max' => 'Максимальный размер изображения=2048'
            ]);
            $data = $request->all();
            $date = new DateTime();
            $data['date'] = $date->format('Y-m-d');
            if ($request->hasFile('photo')) {
                $data['photo'] = $this->addPhoto($request);
            };
            $editOne = Article::find($id);
            $editOne->fill($data);
            $editOne->save();
            return redirect()->route('adminnews');
        }
        $all = Article::find($id);
        return view('admin.news.edit', ['all' => $all]);
    }

}
