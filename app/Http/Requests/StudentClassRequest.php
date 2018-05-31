<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StudentClassRequest extends FormRequest {

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
            'letter_class' => 'required|max:2',
            'start_year' => 'required|max:2100|numeric|min:1950',
            'year_of_issue' => 'required|max:2100|numeric|min:1950'];
    }

    public function messages() {
        return [
            'letter_class.max' => 'Максимум 2 символа',
            'letter_class.required' => 'Не должно быть пустым',
            'start_year.max' => 'максимум 2090',
            'start_year.min' => 'минимум 1950',
            'start_year.numeric' => 'Только числа',
            'start_year.required' => 'Не должно быть пустым',
            'year_of_issue.max' => 'максимум 2090',
            'year_of_issue.min' => 'минимум 1950',
            'year_of_issue.required' => 'Не должно быть пустым',
            'year_of_issue.numeric' => 'Только числа'
        ];
    }

}
