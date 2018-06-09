<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ChecksRequest extends FormRequest {

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
            'image' => 'required|max:2048'];
    }

    public function messages() {
        return [
            'image.required' => 'Загрузите чек',
            'image.image' => 'Загруженный файл должен быть изображением',
            'image.max' => 'Максимальный размер изображения=2048'
        ];
    }

}
