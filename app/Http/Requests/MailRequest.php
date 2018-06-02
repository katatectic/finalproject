<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;

class MailRequest extends FormRequest {

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
            'name' => 'required|max:50',
            'email' => 'required|email',
            'message' => 'required'];
    }

    public function messages() {
        return [
            'name.required' => 'Введите имя пользователя',
            'name.max' => 'Максимум 30 символов',
            'email.required' => 'Выберите почту пользователя',
            'email.email' => 'Введите правильный email',
            'message.required' => 'Введите сообщение пользователю'
        ];
    }

}
