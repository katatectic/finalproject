@extends('layouts.app')
@section('title')
    {{$album->name}}
@endsection
@section('content')
@if($album)
<div id="site-to-top"><i class="fa fa-chevron-up fa-lg"></i></div>
<div class="grid">
    <div id="primary" class="content-area grid__col grid__col--2-of-3">
        <div id="content" class="site-content wrappr">
            <div class="media">    
                <div class="media-body"> 
                    <div class="image-lightbox">
                        <a href="{{asset('images/albums/'.$album->cover_image)}}" data-lightbox="{{asset('images/albums/'.$album->cover_image)}}" title="{{ $album->name }}">
                            <img width="800" height="500" src="{{asset('images/albums/'.$album->cover_image)}}" class="attachment-full size-full wp-post-image" alt="{{$album->name}}"/>
                        </a>
                    </div><br/>	
                    <h3 class="media-heading" style="font-size: 26px;">Название альбома: {{$album->name}}</h3>
                    <div class="media">
                        <h4 class="media-heading" style="font-size: 26px;">Краткое описание альбома: </h4>
                        <p>{{$album->description}}</p>
                        @if((Auth::user() and Auth::user()->role==1) or (Auth::user() and Auth::user()->role==2) or (Auth::user() and Auth::user()->role==3))
                            <a href="{{route('add_image',['id'=>$album->id])}}"><button type="button"more-link button pull-left">Добавить новое фото в альбом</button></a>
                        @endif
                        @if((Auth::user() and Auth::user()->role==1) or (Auth::user() and Auth::user()->role==2))
                            <a href="{{route('album.destroy',$album->id)}}" onclick="return confirm('Удалить альбом?')"><button type="button"class="more-link button pull-right">Удалить альбом</button></a>
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
                </div><br/>   
                @if((Auth::user() and Auth::user()->role==1) or (Auth::user() and Auth::user()->role==2))
                    <a href="{{route('deleteImage',$photo->id)}}" onclick="return confirm('Удалить изображение?')" class="more-link button" style="margin:0 auto">Удалить изображение</a>
                @endif
            </figure>
            @endforeach
            {{$album->Photos->links()}}
        </div>
    </div>
    <div id="primary" class="content-area grid__col grid__col--1-of-3">
        @include('widget')
    </div>
</div>
@endif
@endsection