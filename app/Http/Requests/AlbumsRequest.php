<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AlbumsRequest extends FormRequest {

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
            'name' => 'required',
            'description' => 'required',
            'cover_image' => 'image|max:2048'];
    }

    public function messages() {
        return [
            '*.required' => 'Поле не должно быть пустым',
            'cover_image.image' => 'Загруженный файл должен быть изображением',
            'cover_image.max' => 'Максимальный размер изображения=2048'
        ];
    }

}
