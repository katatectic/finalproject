@extends('layouts.app')
@section('title')
    Галерея
@endsection
@section('content')
<div id="cinemahead">
    <div id="mobile-nav-container"></div>
    <div id="site-to-top"><i class="fa fa-chevron-up fa-lg"></i></div>
</div>
<div class="grid">
    <div id="primary" class="content-area grid__col grid__col--2-of-3">
        <div id="content" class="site-content wrappr">
            <div class="navbar navbar-inverse navbar-fixed-top">
                @if(Auth::user())
                @if(Auth::user()->role==1 or Auth::user()->role==2)
                    <a href="{{ route('album.create')}}" class="more-link button" style="margin:0 auto">Создать новый альбом</a>
                @endif
                @if(Auth::user()->role==3)
                    <a href="{{ route('album.user.create')}}" class="more-link button" style="margin:0 auto">Создать новый альбом</a>
                @endif
                @endif
            </div><br/>
            <div class="gallery">
                @foreach($albums as $album)
                <figure>
                    <a href="{{route('album.show',['id'=>$album->id])}}"><img src="{{asset('images/albums/'.$album->cover_image)}}" alt=""/></a>
                    <div class="navbar navbar-inverse navbar-fixed-top">
                        <a href="{{route('album.show',['id'=>$album->id])}}"><h3>{{$album->name}}</h3></a>
                        <a href="{{route('album.show',['id'=>$album->id])}}"><p>{{$album->description}}</p></a>
                        <a href="{{route('album.show',['id'=>$album->id])}}"><p>Изображений в альбоме {{count($album->Photos)}}</p></a>
                        <div>
                            <a href="{{route('album.show',['id'=>$album->id])}}" class="more-link button" style="float:left">Открыть альбом</a>
                            @if((Auth::user() and Auth::user()->role==1) or (Auth::user() and Auth::user()->role==2))
                                <a href="{{route('album.destroy',$album->id)}}" onclick="return confirm('Удалить альбом?')"class="more-link button" style="float:right">Удалить альбом</a>
                            @endif
                        </div>
                    </div>
                </figure>
                @endforeach
                {{$albums->links()}}
            </div>
        </div>  
    </div> 
     <div id="primary" class="content-area grid__col grid__col--1-of-3">
         @include('widget')
     </div>
</div> 
@endsection