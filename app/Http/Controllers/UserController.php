<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\UsersRequest;
use App\Event;
use App\User;
use App\Comment;
use App\Article;
use App\Report;
use App\StudentClass;
use DateTime;
use Illuminate\Support\Facades\Auth;


class UserController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }
	public $puginationUsers = 9;

    public function adminUsers()
    {
        $users = User::orderBy('id', 'DESC')->with('studentsClasses')->paginate($this->puginationUsers);
        $usersCount = User::count();
        return view('admin.users.adminUsers', ['users' => $users, 'usersCount' => $usersCount]);
    }

    public function profile($id)
    {
        $user = User::with('studentsClasses')->find($id);
        $eventCount = Event::where("user_id", "=", $user->id)->count();
        $newsCount = Article::where("user_id", "=", $user->id)->count();
        return view('profile', compact('user', 'eventCount', 'newsCount'));
    }

    /* public function profileEvents($id) {
      $user = User::find($id);
      return view('profileevents', compact('user', 'userEvents'));
      } */

    public function destroy($id)
    {
        if (!is_numeric($id))
            return view('404');
        User::find($id)->studentsClasses()->detach();
        $all = User::find($id);
		$img = $all->avatar;
        if (is_file(public_path() . '/images/users/' . $img)) {
            unlink(public_path() . '/images/users/' . $img);
        }
        $all->delete();
        return redirect()->route('users');
    }

    public function edit($id)
    {
        $all = User::with('studentsClasses')->find($id);
        $StudentClass = StudentClass::get();
        return view('admin.users.editUser', ['all' => $all, 'studentsClasses' => $StudentClass]);
    }

    public function update($id, UsersRequest $request)
    {
        $data = $request->all();
        if (isset($request->avatar)) {
            $data['avatar'] = $this->addAvatar($request);
        }
        //$data['password'] = bcrypt('password');
        User::find($id)->update(array_filter($data));
        User::find($id)->studentsClasses()->sync($request->studentsClasses);
        return redirect()->route('users');
    }

    public function addAvatar($request)
    {
        $file = $request->file('avatar');
        $newfilename = rand(0, 100) . "." . $file->getClientOriginalExtension();
        $file->move(public_path() . '/images/users', $newfilename);
        return $newfilename;
    }

}
