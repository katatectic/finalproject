@extends('layouts.app')
@section('content')

@if($album)
<div>
    <div class="starter-template">
        <div class="media">    
            <div class="media-body"> <img alt="{{$album->name}}" style="width:300px;height:300px" src="{{asset('images/albums/'.$album->cover_image)}}" >
                <h2 class="media-heading" style="font-size: 26px;">Название альбома: {{$album->name}}</h2>
                <div class="media">
                    <h2 class="media-heading" style="font-size: 26px;">Краткое описание альбома: {{$album->description}}</h2>
                    <a href="{{route('add_image',['id'=>$album->id])}}"><button type="button"class="btn btn-primary btn-large">Добавить новое фото в альбом</button></a>
                    <a href="{{route('deleteAlbum',$album->id)}}" onclick="return confirm('Удалить альбом?')"><button type="button"class="btn btn-danger btn-large">Удалить альбом</button></a>
                </div>
            </div>
        </div>
    </div><br/>
    <div class="row">
        @foreach($album->Photos as $photo)
        <div class="col-lg-3">
            <div class="thumbnail" style="max-height:350px;min-height: 350px;">
                <img alt="{{$photo->name}}" style="max-width:150px;max-height:150px"src="{{asset('images/albums/photos/'.$photo->image)}}">
                <div class="caption">
                    <p>{{$photo->description}}</p>
                    <a href="{{route('deleteImage',$photo->id)}}" onclick="return confirm('Удалить изображение?')"><button type="button" class="btnbtn-danger btn-small">Удалить изображение</button></a>
                </div>
            </div>
        </div>
        @endforeach
    </div>
    @endif
    @endsection