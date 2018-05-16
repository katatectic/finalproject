<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Event;
use App\User;
use App\Article;
use DateTime;

class UserController extends Controller {

    public function adminUsers() {
        $users = User::get();
        $usersCount = User::count();
        return view('admin.users.adminUsers', ['users' => $users, 'usersCount' => $usersCount]);
    }

    public function adminUsersShowOne($id) {
        $user = User::select()->where(['id' => $id])->first();
        return view('admin.users.oneUser', ['user' => $user]);
    }

    public function deleteUser($id) {
        if (!is_numeric($id))
            return view('404');
        $all = User::find($id);
        $all->delete();
        return redirect()->route('users');
    }

    public function editUser($id, Request $request) {
        if ($request->method() == "POST") {
            $this->validate($request, [
                'name' => 'required|alpha|max:30',
                'surname' => 'required|alpha|max:30',
                'middle_name' => 'required|alpha|max:30',
                'phone' => 'required|numeric|digits_between:10,10',
                'email' => 'required|email|max:30|unique:users',
                'password' => 'required|min:6|confirmed',
                    ], [
                '*.required' => 'Поле не должно быть пустым',
                '*.max' => 'Максимум 30 символов',
                '*.alpha' => 'Имя, фамилия и отчество должны содержать только буквы',
                'phone.numeric' => 'В телефоне должны быть только цифры',
                'phone.digits_between' => 'В номере телефона должжно быть 10 цифр',
                'email.email' => 'Email должен быть корректным',
                'email.unique' => 'Данная почта зарегестрирована на другого пользователя',
                'password.min' => 'Пароль должен состоять минимум из 6 символов',
                'password.confirmed' => 'Правильно подтвердите пароль'
            ]);
            $data = $request->all();
            $data['avatar'] = $this->addAvatar($request);
            $data['password'] = bcrypt('password');
            $editOne = User::find($id);
            $editOne->fill($data);
            $editOne->save();
            return redirect()->route('users');
        }
        $all = User::find($id);
        if (!$all) {
            return view('404');
        } else {
            return view('admin.users.editUser', ['all' => $all]);
        }
    }

    public function addAvatar($request) {
        $this->validate($request, ['avatar' => 'required|image|max:2048'], ['avatar.required' => 'Загрузите изображение',
            'avatar.image' => 'Загруженный файл должен быть изображением',
            'avatar.max' => 'Максимальный размер картинки=2048']);
        $file = $request->file('avatar');
        $newfilename = rand(0, 100) . "." . $file->getClientOriginalExtension();
        $file->move(public_path() . '/images/users', $newfilename);
        return $newfilename;
    }

}
