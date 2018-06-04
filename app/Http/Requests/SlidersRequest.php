<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SlidersRequest extends FormRequest {

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
            'title' => 'required|max:50',
            'photo' => 'image|max:2048',
            'description' => 'required'];
    }

    public function messages() {
        return [
            'title.required' => 'Введите название слайдера',
            'title.max' => 'Максимум 30 символов',
            'photo.required' => 'Добавьте изображение',
            'photo.image' => 'Загруженный файл должен быть изображением',
            'photo.max' => 'Максимальный размер изображения=2048',
            'description.required' => 'Введите краткое описание'
        ];
    }

}
