<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\NewsRequest;
use App\Article;
use App\User;
use DateTime;

class NewsController extends Controller {

    public $puginationNews = 5;

    public function index(Request $request) {
        $all = Article::orderBy('id', 'DESC')->paginate($this->puginationNews);
        return view('news', compact('all'));
    }

    public function committeeNews($committeeId) {
        $all = Article::where('student_class_id', $committeeId)->orderBy('id', 'DESC')->paginate($this->puginationNews);
        $committee = $committeeId;
        return view('news', compact('all', 'committee'));
    }

    public function article($id) {
        $article = Article::select()->where('id', $id)->first();
		$article->setRelation('comments', $article->comments()->paginate(1));
		$lastNews=Article::orderBy('id', 'desc')->take(5)->get();
        return view('article', compact('article','lastNews'));
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

    public function store(NewsRequest $request) {
        if ($request->method() == 'POST') {
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
        if (is_file(public_path() . '/images/news/' . $img)) {
            unlink(public_path() . '/images/news/' . $img);
        }
        Article::find($id)->comments()->forceDelete();
        $article->delete();
        return redirect()->route('adminnews');
    }
	public function edit($id) {
          $all = Article::find($id);
        return view('admin.news.edit',compact('all'));
    }

    public function update($id, NewsRequest $request) {
        if ($request->method() == "POST") {
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
            $editOne = Article::find($id);
            $editOne->fill($data);
            $editOne->save();
            return redirect()->route('adminnews');
        }
    }

}
