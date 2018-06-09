<?php

namespace App\Http\Controllers;

use App\Http\Requests\AlbumsRequest;
use App\Album;
use App\Image;

class AlbumController extends Controller {

    public $adminPaginate = 15;
    public $albumPaginate = 10;
    public $imagePaginate = 10;

    public function index() {
        $albums = Album::with('Photos')->paginate($this->albumPaginate);
        return view('album.index', compact('albums'));
    }

    public function adminAlbums() {
        $albumsCount = Album::count();
        $albums = Album::with('Photos')->orderBy('id', 'DESC')->paginate($this->adminPaginate);
        return view('admin.albums.albums', compact('albums', 'albumsCount'));
    }

    public function show($id) {
        $album = Album::with('Photos')->find($id);
        $album->setRelation('Photos', $album->Photos()->paginate($this->imagePaginate));
        return view('album.album', compact('album'));
    }

    public function create() {
        return view('admin.albums.create');
    }

    public function userCreate() {
        return view('album.create');
    }

    public function store(AlbumsRequest $request) {
        $data = $request->all();
        if ($request->hasFile('cover_image')) {
            $data['cover_image'] = $this->saveImage($request->file('cover_image'), '/images/albums');
        }
        $create = Album::create($data);
        if ($request->hasFile('image')) {
            $images = [];
            foreach ($request->image as $image) {
                $path = $this->saveImage($image, '/images/albums/photos/');
                $images[] = ['image' => $path, 'album_id' => $create->id];
            }
        }
        Image::insert($images);

        return redirect()->route('adminAlbums')->with(['status' => 'Новый альбом создан!']);
    }

    public function destroy($id) {
        if (!is_numeric($id)) {
            return false;
        }
        $album = Album::with('Photos')->findOrFail($id);
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
        return redirect()->route('adminAlbums')->with(['status' => 'Альбом удалён!']);
    }

    public function edit($id) {
        $album = Album::find($id);
        return view('admin.albums.edit', compact('album'));
    }

    public function update($id, AlbumsRequest $request) {
        $editOne = Album::find($id);
        $img = $editOne->cover_image;
        $data = $request->all();
        if ($request->hasFile('cover_image')) {
            $data['cover_image'] = $this->saveImage($request->file('cover_image'), '/images/albums');
            if (is_file(public_path() . '/images/albums/' . $img)) {
                unlink(public_path() . '/images/albums/' . $img);
            }
        }
        $editOne->fill($data);
        $editOne->save();
        return redirect()->route('adminAlbums')->with(['status' => 'Альбом обновлён!']);
    }

}
