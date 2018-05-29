<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Album;
use App\Image;

class AlbumController extends Controller {

    public function index() {
        $albums = Album::with('Photos')->get();
        return view('album.index', compact('albums'));
    }

    public function show($id) {
        $album = Album::with('Photos')->find($id);
        return view('album.album', compact('album'));
    }

    public function adminAlbums() {
        $albumsCount = Album::count();
        $albums = Album::with('Photos')->orderBy('id', 'DESC')->paginate(10);
        return view('admin.albums.albums', compact('albums', 'albumsCount'));
    }

    public function create() {
        return view('admin.albums.create');
    }
	public function userCreate() {
        return view('album.create');
    }

    public function addPhoto($request) {
        $file = $request->file('cover_image');
        $newfilename = rand(0, 100) . "." . $file->getClientOriginalExtension();
        $file->move(public_path() . '/images/albums', $newfilename);
        return $newfilename;
    }

    public function store(Request $request) {
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
            return redirect()->route('adminAlbums');
        }
        return view('admin.albums.create');
    }

    public function destroy($id) {
        if (!is_numeric($id))
            return false;
        $album = Album::find($id);
        $img = $album->cover_image;
        if (is_file($img)) {
            unlink(public_path() . '/images/albums/' . $img);
        }
        $album->delete();
        return redirect()->route('adminAlbums');
    }

    public function edit($id, Request $request) {
        if ($request->method() == "POST") {
            $this->validate($request, [
                'name' => 'required',
                'description' => 'required',
                'cover_image' => 'required|image|max:2048',], [
                '*.required' => 'Поле не должно быть пустым',
                'cover_image.image' => 'Загруженный файл должен быть изображением',
                'cover_image' => 'Максимальный размер изображения=2048'
            ]);
            $data = $request->all();
            if ($request->hasFile('cover_image')) {
                $data['cover_image'] = $this->addPhoto($request);
            };
            $editOne = Album::find($id);
            $editOne->fill($data);
            $editOne->save();
            return redirect()->route('adminAlbums');
        }
        $album = Album::find($id);
        return view('admin.albums.edit', compact('album'));
    }

}
