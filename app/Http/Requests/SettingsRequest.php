<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SettingsRequest extends FormRequest {

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
            'title' => 'required',
            'address' => 'required',
            'phone' => 'required',
            'logo' => 'image|max:2048',];
    }

    public function messages() {
        return [
            '*.required' => 'Поле не должно быть пустым',
            'phone.image' => 'Загруженный файл должен быть изображением',
            'phone.max' => 'Максимальный размер изображения=2048'
        ];
    }

}
