<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
use App\User;

class NewsRequest extends FormRequest {

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
        $userId = Auth::id();
        $user = User::with('studentsClasses')->find($userId);
        $studentsClasses = $user->studentsClasses->keyBy('id')->keys();
        return [
            'title' => 'required',
            'date' => 'required',
            'content' => 'required',
            'photo' => 'required|image|max:2048',
            'description' => 'required',
			'student_class_id'=>'required|in:'.$studentsClasses.', 0'];
    }

    public function messages() {
        return [
            '*.required' => 'Поле не должно быть пустым',
            'photo.image' => 'Загруженный файл должен быть изображением',
            'photo.max' => 'Максимальный размер изображения=2048',
            'student_class_id.in' => 'Вы не состоите в этом комитете'
        ];
    }

}
