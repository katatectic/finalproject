<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
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
        if ($request->method() == 'POST') {
            $data = $request->all();
            if ($request->hasFile('photo')) {
                $data['photo'] = $this->addSliderPhoto($request);
            };
            $create = Slider::create($data);
            $id = $create->id;
            return redirect()->route('adminSliders');
        }
        return view('admin.sliders.slider');
    }

    public function destroy($id) {
        if (!is_numeric($id))
            return false;
        $slider = Slider::find($id);
        $img = $slider->photo;
        if (is_file($img)) {
            unlink(public_path() . '/images/sliders/' . $img);
        }
        $slider->delete();
        return redirect()->route('adminSliders');
    }

    public function edit($id) {
        $slider = Slider::find($id);
        return view('admin.sliders.editSlider', compact('slider'));
    }

    public function update($id, SlidersRequest $request) {
        if ($request->method() == "POST") {
            $editOne = Slider::find($id);
            $img = $editOne->photo;
            if (is_file(public_path() . '/images/sliders/' . $img)) {
                unlink(public_path() . '/images/sliders/' . $img);
            }
            $data = $request->all();
            if ($request->hasFile('photo')) {
                $data['photo'] = $this->addSliderPhoto($request);
            };
            $editOne->fill($data);
            $editOne->save();
            return redirect()->route('adminSliders');
        }
    }

    public function addSliderPhoto($request) {
        $file = $request->file('photo');
        $newfilename = rand(0, 100) . "." . $file->getClientOriginalExtension();
        $file->move(public_path() . '/images/sliders', $newfilename);
        return $newfilename;
    }

}
