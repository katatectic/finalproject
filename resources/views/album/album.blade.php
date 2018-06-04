@extends('layouts.app')
@section('title')
    {{$album->name}}
@endsection
@section('content')
@if($album)
<div id="content" class="site-content wrappr">
    <div class="starter-template">
        <div class="media">    
            <div class="media-body" style="margin-left:50px"> 
                <div class="image-lightbox">
                    <a href="{{asset('images/albums/'.$album->cover_image)}}" data-lightbox="{{asset('images/albums/'.$album->cover_image)}}" title="{{ $album->name }}">
                        <img width="500" height="500" src="{{asset('images/albums/'.$album->cover_image)}}" class="attachment-full size-full wp-post-image" alt="{{$album->name}}"/>
                    </a>
                </div>	
                <h2 class="media-heading" style="font-size: 26px;">Название альбома: {{$album->name}}</h2>
                <div class="media">
                    <h2 class="media-heading" style="font-size: 26px;">Краткое описание альбома: {{$album->description}}</h2>
                    @if((Auth::user() and Auth::user()->role==1) or (Auth::user() and Auth::user()->role==2) or (Auth::user() and Auth::user()->role==3))
                        <a href="{{route('add_image',['id'=>$album->id])}}"><button type="button"class="btn btn-primary btn-large">Добавить новое фото в альбом</button></a>
                    @endif
                    @if((Auth::user() and Auth::user()->role==1) or (Auth::user() and Auth::user()->role==2))
                        <a href="{{route('album.destroy',$album->id)}}" onclick="return confirm('Удалить альбом?')"><button type="button"class="btn btn-danger btn-large">Удалить альбом</button></a>
                    @endif
                </div>
            </div>
        </div>
    </div>
    <div class="gallery">
        @foreach($album->Photos as $photo)
        <figure>
            <div class="image-lightbox">
                <a href="{{asset('images/albums/photos/'.$photo->image)}}" data-lightbox="roadtrip" title="{{ $photo->description }}">
                    <img src="{{asset('images/albums/photos/'.$photo->image)}}"alt="{{$photo->name}}"/>
                </a>
            </div>   
            @if((Auth::user() and Auth::user()->role==1) or (Auth::user() and Auth::user()->role==2))
            <a href="{{route('deleteImage',$photo->id)}}" onclick="return confirm('Удалить изображение?')" class="more-link button" style="margin:0 auto">Удалить изображение</a>
            @endif
        </figure>
        @endforeach
        {{$album->Photos->links()}}
    </div>
</div>
</div>
@endif
@endsection