<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;

class RegisterController extends Controller {
    /*
      |--------------------------------------------------------------------------
      | Register Controller
      |--------------------------------------------------------------------------
      |
      | This controller handles the registration of new users as well as their
      | validation and creation. By default this controller uses a trait to
      | provide this functionality without requiring any additional code.
      |
     */

use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct() {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data) {
        return Validator::make($data, [
                    'name' => 'required|alpha|max:30',
                    'surname' => 'required|alpha|max:30',
                    'middle_name' => 'required|alpha|max:30',
                    'phone' => 'required|numeric|digits_between:10,10',
                    'email' => 'required|email|max:30|unique:users',
                    'avatar' => 'nullable|image|max:2048',
                    'password' => 'required|min:6|confirmed',
                        ], [
                    '*.required' => 'Поле не должно быть пустым',
                    '*.max' => 'Максимум 30 символов',
                    '*.alpha' => 'Имя, фамилия и отчество должны содержать только буквы',
                    'phone.numeric' => 'В телефоне должны быть только цифры',
                    'phone.digits_between' => 'В номере телефона должжно быть 10 цифр',
                    'email.email' => 'Email должен быть корректным',
                    'email.unique' => 'Данная почта зарегестрирована на другого пользователя',
                    'avatar.image' => 'Загруженный файл должен быть изображением',
                    'avatar.max' => 'Максимальный размер изображения=2048',
                    'password.min' => 'Пароль должен состоять минимум из 6 символов',
                    'password.confirmed' => 'Правильно подтвердите пароль'
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data) {
        $request = request();

        $profileImage = $request->file('avatar');
        $newfilename = rand(0, 100) . "." . $profileImage->getClientOriginalExtension();
        $profileImage->move(public_path() . '/images/users', $newfilename);

        return User::create([
                    'surname' => $data['surname'],
                    'name' => $data['name'],
                    'middle_name' => $data['middle_name'],
                    'email' => $data['email'],
                    'phone' => $data['phone'],
                    'avatar' => $newfilename,
                    'password' => bcrypt($data['password']),
        ]);
    }

}
