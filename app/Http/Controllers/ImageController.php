<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Album;
use App\Image;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;

class ImageController extends Controller {

    public function getForm($id) {
        $album = Album::findOrFail($id);
        return view('album.addimage', compact('album'));
    }

    public function imageAdd(Request $request) {
        if ($request->method() == 'POST') {
            $this->validate($request, [
                'description' => 'required',
                'image' => 'required|image|max:2048',], [
                '*.required' => 'Поле не должно быть пустым',
                'image.image' => 'Загруженный файл должен быть изображением',
                'image.max' => 'Максимальный размер изображения=2048'
            ]);
            $data = $request->all();
            if ($request->hasFile('image')) {
                $data['image'] = $this->image($request);
            };
            $create = Image::create($data);
            $id = $create->id;
            return redirect()->route('getlist');
        }
        return view('albums.addimage');
    }

    public function deleteImage($id) {
        if (!is_numeric($id))
            return false;
        $all = Image::find($id);
        $img = $all->image;
        unlink(public_path() . '/images/albums/photos/' . $img);
        $all->delete();
        return redirect()->route('getlist');
    }

    public function image($request) {
        $file = $request->file('image');
        $newfilename = rand(0, 100) . "." . $file->getClientOriginalExtension();
        $file->move(public_path() . '/images/albums/photos/', $newfilename);
        return $newfilename;
    }

}
