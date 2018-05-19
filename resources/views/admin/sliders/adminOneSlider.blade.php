@extends('layouts.app')
@section('content')
<div class="content">
    <div class="row">
        @if($slider)
        <div class="col-lg-8 col-md-8 col-sm-8">
            <div class="left_content">
                <figure class="post-thumbnail">
                    <img width="1140" height="300" src="{{asset('images/sliders/'.$slider->photo)}}" class="attachment-full size-full wp-post-image" alt="" srcset="{{asset('images/'.$slider->photo)}} 1140, {{asset('images/'.$slider->photo)}} 300w" sizes="(max-width: 1140) 300vw, 1140"/>
                </figure>
                <header class="entry-header">
                    <h1 class="entry-title">{{$slider->title}}</h1>
                    <p>{{$slider->description}}</p>
            </div>
            <a href="{{ route('slider.edit',['id'=>$slider->id]) }}" class="more-link button">Редактировать слайдер</a>
            <a href="{{route('slider.destroy',$slider->id)}}" onclick="return confirm('Удалить слайдер?')" class="more-link button" style="float:right">Удалить слайдер</a>
            @endif
        </div>
        @endsection    
        </body>
        </html>