@extends('layouts.app')
@section('content')

@if($album)
<div>
    <div class="starter-template">
        <div class="media">    
            <div class="media-body"> 
                <div class="image-lightbox">
                    <a href="{{asset('images/albums/'.$album->cover_image)}}" data-lightbox="{{asset('images/albums/'.$album->cover_image)}}" title="{{ $album->name }}">
                        <img width="500" height="500" src="{{asset('images/albums/'.$album->cover_image)}}" class="attachment-full size-full wp-post-image" alt="{{$album->name}}"/>
                    </a>
                </div>	
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
            <div class="image-lightbox">
                <a href="{{asset('images/albums/photos/'.$photo->image)}}" data-lightbox="roadtrip" title="{{ $photo->description }}">
                    <img width="250" height="250" src="{{asset('images/albums/photos/'.$photo->image)}}" class="attachment-full size-full wp-post-image" alt="{{$photo->name}}"/>
                </a>
            </div>
            <div class="caption">
                <a href="{{route('deleteImage',$photo->id)}}" onclick="return confirm('Удалить изображение?')"><button type="button" class="btnbtn-danger btn-small">Удалить изображение</button></a>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endif
@endsection