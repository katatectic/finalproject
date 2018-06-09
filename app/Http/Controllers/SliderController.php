<?php

namespace App\Http\Controllers;

use App\Http\Requests\SlidersRequest;
use App\Slider;

class SliderController extends Controller {

    public function adminSliders() {
        $sliders = Slider::orderBy('id', 'DESC')->paginate(10);
        return view('admin.sliders.adminSliders', compact('sliders'));
    }

    public function show($id) {
        $slider = Slider::select()->where('id', $id)->first();
        return view('admin.sliders.adminOneSlider', compact('slider'));
    }

    public function create() {

        return view('admin.sliders.slider');
    }

    public function store(SlidersRequest $request) {
        $data = $request->all();
        if ($request->hasFile('photo')) {
            $data['photo'] = $this->saveImage($request, '/images/sliders', 'photo');
        };
        $create = Slider::create($data);
        return redirect()->route('adminSliders')->with(['status' => 'Новый слайдер создан!']);
    }

    public function destroy($id) {
        if (!is_numeric($id)) {
            return false;
        }
        $slider = Slider::findOrFail($id);
        $img = $slider->photo;
        if (is_file($img)) {
            unlink(public_path() . '/images/sliders/' . $img);
        }
        $slider->delete();
        return redirect()->route('adminSliders')->with(['status' => 'Слайдер удалён!']);
    }

    public function edit($id) {
        $slider = Slider::find($id);
        return view('admin.sliders.editSlider', compact('slider'));
    }

    public function update($id, SlidersRequest $request) {
        $editOne = Slider::find($id);
        $img = $editOne->photo;
        $data = $request->all();
        if ($request->hasFile('photo')) {
            $data['photo'] = $this->saveImage($request, '/images/sliders', 'photo');
            if (is_file(public_path() . '/images/sliders/' . $img)) {
                unlink(public_path() . '/images/sliders/' . $img);
            }
        };
        $editOne->fill($data);
        $editOne->save();
        return redirect()->route('adminSliders')->with(['status' => 'Слайдер обновлён!']);
    }

}
