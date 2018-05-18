@extends('layouts.app')
@section('content')

<div id="cinemahead">
    <div id="mobile-nav-container"></div><!-- Small devices menu -->
</div>
<div class="navbar navbar-inverse navbar-fixed-top">
    <a href="{{ route('albumcreate')}}" class="more-link button">Создать новый альбом</a>
</div><br/>
</div>
<div class="container">
    <div class="starter-template">
        <div class="row">
            @foreach($albums as $album)
            <div class="col-lg-3">
                <div class="thumbnail" style="height:514px;width:500px">
                    <a href="{{route('onealbum',['id'=>$album->id])}}"><img alt="{{$album->name}}"  style="width:300px;height:300px"src="{{asset('images/albums/'.$album->cover_image)}}"></a>
                    <div class="caption">
                        <a href="{{route('onealbum',['id'=>$album->id])}}"><h3>{{$album->name}}</h3></a>
                        <a href="{{route('onealbum',['id'=>$album->id])}}"><p>{{$album->description}}</p></a>
                        <a href="{{route('onealbum',['id'=>$album->id])}}"><p>Изображений в альбоме {{count($album->Photos)}}</p></a>
                        <p><a href="{{route('onealbum',['id'=>$album->id])}}" class="more-link button">Открыть альбом</a></p>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>
@endsection