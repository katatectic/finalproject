<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;

class UsersRequest extends FormRequest {

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize() {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(Request $request) {
        return [
            'name' => 'required|alpha|max:30',
            'surname' => 'required|alpha|max:30',
            'middle_name' => 'required|alpha|max:30',
			'day' => 'required',
			'year' => 'required',
			'month' => 'required',
            'phone' => 'required|numeric|digits_between:10,10',
            'email' => 'required|email|max:30|unique:users,email,' . $request->id . ',id',
            'password' => 'confirmed',
            'avatar' => 'image|max:2048'];
    }

    public function messages() {
        return [
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
        ];
    }

}
