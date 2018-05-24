<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Event;
use App\User;
use App\Comment;
use App\Article;
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
        return view('admin.users.adminUsers', ['users' => $users, 'usersCount' => $usersCount,
            'transition' => $this->transition(), 'roleNames' => $this->roleNames]);
    }

    public function profile($id)
    {
        $user = User::with('studentsClasses')->find($id);
        $eventCount = Event::where("user_id", "=", $user->id)->count();
        $newsCount = Article::where("user_id", "=", $user->id)->count();
        return view('profile', compact('user', 'eventCount', 'newsCount'),
            ['transition' => $this->transition(), 'roleNames' => $this->roleNames]);
    }

    /* public function profileEvents($id) {
      $user = User::find($id);
      return view('profileevents', compact('user', 'userEvents'));
      } */

    public function destroy($id)
    {
        if (!is_numeric($id))
            return view('404');
        $all = User::find($id);
        $all->delete();
        return redirect()->route('users');
    }

    public function edit($id)
    {
        $all = User::with('studentsClasses')->find($id);
        $StudentClass = StudentClass::get();
        return view('admin.users.editUser', ['all' => $all, 'roleNames' => $this->roleNames,
            'studentsClasses' => $StudentClass, 'transition' => $this->transition()]);
    }

    public function update($id, Request $request)
    {
        $this->validate($request, [
            'name' => 'required|alpha|max:30',
            'surname' => 'required|alpha|max:30',
            'middle_name' => 'required|alpha|max:30',
            'phone' => 'required|numeric|digits_between:10,10',
            'email' => 'required|email|max:30|unique:users,email,' . $request->id . ',id',
            'password' => 'confirmed',
            'avatar' => 'image|max:2048'
        ], [
            '*.required' => 'Поле не должно быть пустым',
            '*.max' => 'Максимум 30 символов',
            '*.alpha' => 'Имя, фамилия и отчество должны содержать только буквы',
            'phone.numeric' => 'В телефоне должны быть только цифры',
            'phone.digits_between' => 'В номере телефона должжно быть 10 цифр',
            'email.email' => 'Email должен быть корректным',
            'avatar.image' => 'Загруженный файл должен быть изображением',
            'avatar.max' => 'Максимальный размер картинки=2048',
            'email.unique' => 'Данная почта зарегестрирована на другого пользователя',
            'password.min' => 'Пароль должен состоять минимум из 6 символов',
            'password.confirmed' => 'Пароли не совпадают'
        ]);
        $data = $request->all();
        if (isset($request->avatar)) {
            $data['avatar'] = $this->addAvatar($request);
        }
        $data['password'] = bcrypt('password');
        User::find($id)->update(array_filter($data));
        User::find($id)->studentsClasses()->sync($request->studentsClasses, false);
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
