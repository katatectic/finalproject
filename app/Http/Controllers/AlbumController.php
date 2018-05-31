<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\AlbumsRequest;
use App\Album;
use App\Image;

class AlbumController extends Controller {

    public function index() {
        $albums = Album::with('Photos')->get();
        return view('album.index', compact('albums'));
    }

    public function adminAlbums() {
        $albumsCount = Album::count();
        $albums = Album::with('Photos')->orderBy('id', 'DESC')->paginate(10);
        return view('admin.albums.albums', compact('albums', 'albumsCount'));
    }

    public function show($id) {
        $album = Album::with('Photos')->find($id);
        return view('album.album', compact('album'));
    }

    public function create() {
        return view('admin.albums.create');
    }

    public function userCreate() {
        return view('album.create');
    }

    public function store(AlbumsRequest $request) {
        if ($request->method() == 'POST') {
            $data = $request->all();
            if ($request->hasFile('cover_image')) {
                $data['cover_image'] = $this->addPhoto($request);
            };
            $create = Album::create($data);
            $id = $create->id;
            return redirect()->route('adminAlbums');
        }
        return view('admin.albums.create');
    }

    public function destroy($id) {
        if (!is_numeric($id)){
            return false;
        }
        $album = Album::with('Photos')->find($id);
        $img = $album->cover_image;
        if (is_file(public_path() . '/images/albums/' . $img)) {
            unlink(public_path() . '/images/albums/' . $img);
        }
        $images = $album->Photos;
        foreach ($images as $image) {
            if (is_file(public_path() . '/images/albums/photos/' . $image->image)) {
                unlink(public_path() . '/images/albums/photos/' . $image->image);
            }
        }
        $album->delete();
        return redirect()->route('adminAlbums');
    }

    public function edit($id) {
        $album = Album::find($id);
        return view('admin.albums.edit', compact('album'));
    }

    public function update($id, AlbumsRequest $request) {
        if ($request->method() == "POST") {
            $editOne = Album::find($id);
            $img = $editOne->cover_image;
            if (is_file(public_path() . '/images/albums/' . $img)) {
                unlink(public_path() . '/images/albums/' . $img);
            }
            $data = $request->all();
            if ($request->hasFile('cover_image')) {
                $data['cover_image'] = $this->addPhoto($request);
            };
            $editOne->fill($data);
            $editOne->save();
            return redirect()->route('adminAlbums');
        }
    }

    public function addPhoto($request) {
        $file = $request->file('cover_image');
        $newfilename = rand(0, 100) . "." . $file->getClientOriginalExtension();
        $file->move(public_path() . '/images/albums', $newfilename);
        return $newfilename;
    }

}
