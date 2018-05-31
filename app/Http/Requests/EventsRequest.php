<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EventsRequest extends FormRequest {

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
            'event_date' => 'required',
            'event_hours' => 'required',
            'address' => 'required',
            'description' => 'required',
            'content' => 'required',
            'photo' => 'required|image|max:2048'];
    }

    public function messages() {
        return [
            '*.required' => 'Поле не должно быть пустым',
            'photo.image' => 'Загруженный файл должен быть изображением',
            'photo.max' => 'Максимальный размер изображения=2048'
        ];
    }

}
