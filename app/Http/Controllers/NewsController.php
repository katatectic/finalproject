<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
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
        $studentsClasses = StudentClass::get();
        return view('admin.news.create', ['user' => $user, 'studentsClasses' => $studentsClasses]);
    }

    public function userNewsCreate() {
        $userId = Auth::id();
        $user = User::with('studentsClasses')->find($userId);
        return view('user.useraddnews', ['user' => $user]);
    }

    public function adminNewsStore(NewsRequest $request) {
        if ($request->method() == 'POST') {
            $data = $request->all();
            if ($data['student_class_id'] == 0) {
                unset($data['student_class_id']);
            }
            unset($data['__token']);
            $date = new DateTime($data['date']);
            $data['date'] = $date->format('Y-m-d h:i:s');
            if ($request->hasFile('photo')) {
                $data['photo'] = $this->addPhoto($request);
            };
            $create = Article::create($data);
            $id = $create->id;
            return redirect()->route('adminnews');
        }
        return view('admin.news.create');
    }

    public function userNewsStore(NewsRequest $request) {
        if ($request->method() == 'POST') {
            $data = $request->all();
            unset($data['__token']);
            $date = new DateTime($data['date']);
            $data['date'] = $date->format('Y-m-d h:i:s');
            if ($request->hasFile('photo')) {
                $data['photo'] = $this->addPhoto($request);
            };
            if ($data['student_class_id'] == 0) {
                unset($data['student_class_id']);
            }
            $create = Article::create($data);
            $id = $create->id;
            return redirect()->route('adminnews');
        }
        return view('admin.news.create');
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
        $date = new DateTime($all->date);
        $all->date = $date->format('Y-m-d\Th:i');
        $studentsClasses = StudentClass::get();
        return view('admin.news.edit', compact('all', 'studentsClasses'));
    }

    public function update($id, NewsRequest $request) {
        $editOne = Article::find($id);
        $img = $editOne->photo;
        $data = $request->all();
        if ($request->hasFile('photo')) {
            $data['photo'] = $this->addPhoto($request);
            if (is_file(public_path() . '/images/news/' . $img)) {
                unlink(public_path() . '/images/news/' . $img);
            }
        }
        if ($data['student_class_id'] == 0) {
            $data['student_class_id'] = null;
        }
        $date = new DateTime($data['date']);
        $data['date'] = $date->format('Y-m-d h:i:s');
        Article::find($id)->update($data);
        $editOne->fill($data);
        $editOne->save();
        return redirect()->route('adminnews');
    }

    public function chooseNews(Request $request) {
        $chooseNews = $request->year . '-' . '0' . $request->month;
        $newsDate = Article::where('date', 'like', '%' . $chooseNews . '%')->paginate($this->puginationNews);
        $lastNews = Article::orderBy('id', 'desc')->take($this->lastNews)->get();
        return view('news.choose', compact('newsDate', 'lastNews'));
    }

    public function chooseAdminNews(Request $request) {
        $chooseAdminNews = $request->year . '-' . '0' . $request->month;
        $newsDate = Article::where('date', 'like', '%' . $chooseAdminNews . '%')->paginate($this->puginationAdminNews);
        return view('admin.news.choose', compact('newsDate'));
    }

}
