<?php

namespace App\Http\Controllers;

use App\Http\Requests\NewsRequest;
use App\Article;
use App\User;
use DateTime;
use App\StudentClass;
use Illuminate\Support\Facades\Auth;

class NewsController extends Controller {

    public $puginationNews = 5;
    public $puginationArticleComments = 10;
    public $lastNews = 5;
    public $puginationAdminNews = 15;

    public function index() {
        $all = Article::orderBy('id', 'DESC')->paginate($this->puginationNews);
        return view('news.news', compact('all'));
    }

    public function committeeNews($committeeId) {
        $committee = StudentClass::find($committeeId);
        $all = Article::where('student_class_id', $committeeId)->orderBy('id', 'DESC')->paginate($this->puginationNews);
        return view('news.news', compact('all', 'committee'));
    }

    public function article($id) {
        $article = Article::select()->where('id', $id)->first();
        $article->setRelation('comments', $article->comments()->paginate($this->puginationArticleComments));
        $lastNews = Article::orderBy('id', 'desc')->take($this->lastNews)->get();
        return view('news.article', compact('article', 'lastNews'));
    }

    public function adminNews() {
        $all = Article::orderBy('id', 'DESC')->paginate($this->puginationAdminNews);
        $newsCount = Article::count();
        return view('admin.news.index', compact('all', 'newsCount'));
    }

    public function create() {
        $userId = Auth::id();
        $user = User::with('studentsClasses')->find($userId);
        return view('admin.news.create', ['user' => $user]);
    }

    public function userNewsCreate() {
        $userId = Auth::id();
        $user = User::with('studentsClasses')->find($userId);
        return view('user.useraddnews', ['user' => $user]);
    }

    public function adminNewsStore(NewsRequest $request) {
        $data = $request->all();
        unset($data['__token']);
        $date = new DateTime();
        $data['date'] = $date->format('Y-m-d');
        if ($request->hasFile('photo')) {
            $data['photo'] = $this->addPhoto($request);
        };
        $create = Article::create($data);
        return redirect()->route('adminnews');
    }

    public function userNewsStore(NewsRequest $request) {
        $data = $request->all();
        unset($data['__token']);
        $date = new DateTime();
        $data['date'] = $date->format('Y-m-d');
        if ($request->hasFile('photo')) {
            $data['photo'] = $this->addPhoto($request);
        };
        $create = Article::create($data);
        $id = $create->id;
        return redirect()->route('main');
    }

    public function addPhoto($request) {
        $file = $request->file('photo');
        $newfilename = rand(1000, 50000) . "." . $file->getClientOriginalExtension();
        $file->move(public_path() . '/images/news', $newfilename);
        return $newfilename;
    }

    public function destroy($id) {
        if (!is_numeric($id)) {
            return false;
        }
        $article = Article::findOrFail($id);
        $img = $article->photo;
        if (is_file(public_path() . '/images/news/' . $img)) {
            unlink(public_path() . '/images/news/' . $img);
        }
        Article::find($id)->comments()->forceDelete();
        $article->delete();
        return redirect()->route('adminnews');
    }

    public function edit($id) {
        $all = Article::find($id);
        return view('admin.news.edit', compact('all'));
    }

    public function update($id, NewsRequest $request) {
        $editOne = Article::find($id);
        $img = $editOne->photo;
        if (is_file(public_path() . '/images/news/' . $img)) {
            unlink(public_path() . '/images/news/' . $img);
        }
        $data = $request->all();
        $date = new DateTime();
        $data['date'] = $date->format('Y-m-d');
        if ($request->hasFile('photo')) {
            $data['photo'] = $this->addPhoto($request);
        };
        $editOne->fill($data);
        $editOne->save();
        return redirect()->route('adminnews');
    }

}
