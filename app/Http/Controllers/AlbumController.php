<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Album;
use App\Image;

class AlbumController extends Controller {

    public function getList() {
        $albums = Album::with('Photos')->get();
        return view('album.index', compact('albums'));
    }

    public function getAlbum($id) {
        $album = Album::with('Photos')->find($id);
        return view('album.album', compact('album'));
    }

    public function getForm() {
        return view('album.createalbum');
    }

    public function addPhoto($request) {
        $file = $request->file('cover_image');
        $newfilename = rand(0, 100) . "." . $file->getClientOriginalExtension();
        $file->move(public_path() . '/images/albums', $newfilename);
        return $newfilename;
    }

    public function albumCreate(Request $request) {
        if ($request->method() == 'POST') {
            $this->validate($request, [
                'name' => 'required',
                'description' => 'required',
                'cover_image' => 'required|image|max:2048',], [
                '*.required' => 'Поле не должно быть пустым',
                'cover_image.image' => 'Загруженный файл должен быть изображением',
                'cover_image.max' => 'Максимальный размер изображения=2048'
            ]);
            $data = $request->all();
            if ($request->hasFile('cover_image')) {
                $data['cover_image'] = $this->addPhoto($request);
            };
            $create = Album::create($data);
            $id = $create->id;
            return redirect()->route('getlist');
        }
        return view('album.createalbum');
    }

    public function deleteAlbum($id) {
        if (!is_numeric($id))
            return false;
        $album = Album::find($id);
        $img = $album->cover_image;
		if(is_file($img)) {
			unlink(public_path() . '/images/albums/' . $img);
		}	
        $album->delete();
        return redirect()->route('getlist');
    }

}
