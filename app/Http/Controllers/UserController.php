<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\UsersRequest;
use App\Event;
use App\User;
use App\Comment;
use App\Article;
use App\Report;
use App\Cache;
use App\StudentClass;
use DateTime;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller {

    public function __construct() {
        $this->middleware('auth');
    }

    public $puginationUsers = 9;
    public $puginationNews = 5;
    public $puginationEvents = 5;
    public $puginationReports = 6;
    public $profileEvents = 5;
    public $profileNews = 5;
    public $profileReports = 5;

    public function adminUsers() {
        $users = User::orderBy('id', 'DESC')->with('studentsClasses')->paginate($this->puginationUsers);
        $usersCount = User::count();
        return view('admin.users.adminUsers', ['users' => $users, 'usersCount' => $usersCount]);
    }

    public function profile($id) {
        $user = User::with('studentsClasses')->find($id);
        $eventCount = Event::where("user_id", "=", $user->id)->count();
        $newsCount = Article::where("user_id", "=", $user->id)->count();
        $reportsCount = Report::where("user_id", "=", $user->id)->count();
        return view('profile.profile', compact('user', 'eventCount', 'newsCount', 'reportsCount'));
    }

    public function profileEvents($id) {
        $user = User::find($id);
        $user->setRelation('events', $user->events()->orderBy('id', 'DESC')->paginate($this->puginationEvents));
        $lastEvents = Event::orderBy('id', 'desc')->take($this->profileEvents)->get();
        return view('profile.events', compact('user', 'lastEvents'));
    }

    public function profileNews($id) {
        $user = User::find($id);
        $user->setRelation('articles', $user->articles()->orderBy('id', 'DESC')->paginate($this->puginationNews));
        $lastNews = Article::orderBy('id', 'desc')->take($this->profileNews)->get();
        return view('profile.news', compact('user', 'lastNews'));
    }

    public function profileReports($id) {
        $user = User::find($id);
        $user->setRelation('reports', $user->reports()->orderBy('id', 'DESC')->paginate($this->puginationReports));
        $lastReports = Report::orderBy('id', 'desc')->take($this->profileReports)->get();
        return view('profile.reports', compact('user', 'lastReports'));
    }

    public function destroy($id) {
        if (!is_numeric($id))
            return view('404');
        User::find($id)->studentsClasses()->detach();
        $all = User::find($id);
        $img = $all->avatar;
        if (is_file(public_path() . '/images/users/' . $img)) {
            unlink(public_path() . '/images/users/' . $img);
        }
        $all->delete();
        return redirect()->route('users')->with(['status' => 'Профиль пользователя удалён!']);
    }

    public function edit($id) {
        $all = User::with('studentsClasses')->find($id);
        $StudentClass = StudentClass::get();
        return view('admin.users.editUser', ['all' => $all, 'studentsClasses' => $StudentClass]);
    }

    public function update($id, UsersRequest $request) {
        $editOne = User::find($id);
        $img = $editOne->avatar;
        $data = $request->all();
        $data['birthday'] = $request->year . '-' . $request->month . '-' . $request->day;
        if (isset($request->avatar)) {
            $data['avatar'] = $this->saveImage($request->file('avatar'), '/images/users');
            if (is_file(public_path() . '/images/users/' . $img)) {
                unlink(public_path() . '/images/users/' . $img);
            }
            
        }
        User::find($id)->update(array_filter($data));
        User::find($id)->studentsClasses()->sync($request->studentsClasses);
        return redirect()->route('users')->with(['status' => 'Профиль пользователя изменён!']);
    }

}
