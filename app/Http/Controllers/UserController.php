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
        $user = User::select()->where('id', $id)->first();
        return view('admin.users.adminOneUser', ['user' => $user]);
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
            $data = $request->all();
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
}
