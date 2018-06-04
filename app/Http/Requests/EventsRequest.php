<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
use App\User;
use App\StudentClass;

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
        if (Auth::user()->role != 1) {
            $userId = Auth::id();
            $user = User::with('studentsClasses')->find($userId);
            $studentsClasses = $user->studentsClasses->keyBy('id')->keys()->all();
        } else {
            $studentsClasses = StudentClass::get()->keyBy('id')->keys()->all();
        }
        return [
            'title' => 'required',
            'event_date' => 'required',
            'event_hours' => 'required',
            'address' => 'required',
            'description' => 'required',
            'content' => 'required',
            'photo' => 'image|max:2048',
            'student_class_id'=>'required|in:0,'.implode(",", $studentsClasses)];
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
