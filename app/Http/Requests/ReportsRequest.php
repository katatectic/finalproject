<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ReportsRequest extends FormRequest {

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
            'content' => 'required',
            'date' => 'required',
            'pay_check' => 'required|image|max:2048',];
    }

    public function messages() {
        return [
            '*.required' => 'Поле не должно быть пустым',
            'pay_check.image' => 'Загруженный файл должен быть изображением',
            'pay_check.max' => 'Максимальный размер изображения=2048'
        ];
    }

}