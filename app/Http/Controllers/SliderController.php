<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Slider;

class SliderController extends Controller {

    public function addView() {

        return view('admin.sliders.slider');
    }

    public function addSlider(Request $request) {
        if ($request->method() == 'POST') {
            $this->validate($request, ['title' => 'required|max:50',
                'photo' => 'required|image|max:2048',
                'description' => 'required',], ['title.required' => 'Введите название слайдера',
                'title.max' => 'Максимум 30 символов',
                'photo.required' => 'Добавьте изображение',
                'photo.image' => 'Загруженный файл должен быть изображением',
                'photo.max' => 'Максимальный размер изображения=2048',
                'description.required' => 'Введите краткое описание']);
            $data = $request->all();
            $create = Slider::create($data);
            if ($request->hasFile('photo')) {
                $data['photo'] = $this->addSliderPhoto($request);
            };
            $id = $create->id;
            return redirect()->route('adminSliders');
        }
        return view('admin.sliders.slider');
    }

    public function addSliderPhoto($request) {
        $file = $request->file('photo');
        $newfilename = rand(0, 100) . "." . $file->getClientOriginalExtension();
        $file->move(public_path() . '/images//sliders', $newfilename);
        return $newfilename;
    }

    public function adminSliders() {
        $sliders = Slider::orderBy('id', 'DESC')->paginate(3);
        return view('admin.sliders.adminSliders', compact('sliders'));
    }

    public function adminOneSlider($id) {
        $slider = Slider::select()->where('id', $id)->first();
        return view('admin.sliders.adminOneSlider', compact('slider'));
    }

    public function deleteSlider($id) {
        if (!is_numeric($id))
            return false;
        $slider = Slider::find($id);
        $slider->delete();
        return redirect()->route('adminSliders');
    }

    public function editSlider($id, Request $request) {
        if ($request->method() == "POST") {
            $this->validate($request, [
                'title' => 'required',
                'description' => 'required',
                'photo' => 'required|image|max:2048',], [
                '*.required' => 'Поле не должно быть пустым',
                'photo.image' => 'Загруженный файл должен быть изображением',
                'photo.max' => 'Максимальный размер изображения=2048'
            ]);
            $data = $request->all();
            if ($request->hasFile('photo')) {
                $data['photo'] = $this->addSliderPhoto($request);
            };
            $editOne = Slider::find($id);
            $editOne->fill($data);
            $editOne->save();
            return redirect()->route('adminSliders');
        }
        $slider = Slider::find($id);
        return view('admin.sliders.editSlider', compact('slider'));
    }

}
