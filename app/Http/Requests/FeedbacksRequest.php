<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class FeedbacksRequest extends FormRequest {

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
    public function rules() {
        return [
            'name' => 'required|max:50',
            'email' => 'required|email',
            'message' => 'required'];
    }

    public function messages() {
        return [
            'name.required' => 'Введите Ваше имя',
            'name.max' => 'Максимум 30 символов',
            'email.required' => 'Выберите Вашу почту',
            'email.email' => 'Введите правильный email',
            'message.required' => 'Введите сообщение'
        ];
    }

}
