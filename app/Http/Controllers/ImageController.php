<?php

namespace App\Http\Controllers;

use App\Http\Requests\ImagesRequest;
use App\Album;
use App\Image;

class ImageController extends Controller {

    public function getForm($id) {
        $album = Album::findOrFail($id);
        return view('album.addimage', compact('album'));
    }

    public function imageAdd(ImagesRequest $request, $albumId) {
        if ($request->hasFile('image')) {
            $images = [];
            foreach ($request->image as $check) {
                $path = $this->saveImage($check, '/images/albums/photos/');
                $images[] = ['image' => $path, 'album_id' => $albumId];
            }
        }
        Image::insert($images);
        return redirect()->route('album.index');
    }

    public function deleteImage($id) {
        if (!is_numeric($id)) {
            return false;
        }
        $photo = Image::findOrFail($id);
        $img = $photo->image;
        if (is_file(public_path() . '/images/albums/photos/' . $img)) {
            unlink(public_path() . '/images/albums/photos/' . $img);
        }
        $photo->delete();
        return redirect()->route('album.index');
    }

    public function image($request) {
        $file = $request->file('image');
        $newfilename = rand(0, 100) . "." . $file->getClientOriginalExtension();
        $file->move(public_path() . '/images/albums/photos/', $newfilename);
        return $newfilename;
    }

}
