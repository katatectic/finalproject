@extends('layouts.admin')
@section('title')
	{{$slider->title}}
@endsection
@section('content')
<div class="content-wrapper">
    <section class="content-header">
        <h1>
            Слайдер
        </h1>
    </section>
    <section class="content">
        @if($slider)
        <div class="box">
            <div class="box-body">
                <div class="image-lightbox">
                    <a href="{{asset('images/sliders/'.$slider->photo)}}" data-lightbox="{{asset('images/sliders/'.$slider->photo)}}" title="{{ $slider->title }}">
                        <img width="500" height="500" src="{{asset('images/sliders/'.$slider->photo)}}" class="attachment-full size-full wp-post-image" alt="{{ $slider->title }}"/>
                    </a>
                </div>
                <div class="col-md-12">
                    <h1 class="entry-title">Название: {{$slider->title}}</h1>
                    <h2>Краткое описание:</h2>
                    <p>{{ $slider->description}}</p>
                    <div class="box-footer">
                        <button class="btn btn-success pull-left bg-orange" onclick="window.history.go(-1); return false;">Назад</button>
                        <a class="btn btn-success pull-right bg-orange" href="{{route('slider.destroy',$slider->id)}}" onclick="return confirm('Удалить слайдер?')">Удалить слайдер</a>
                    </div>
                </div>
            </div>
        </div>
        @endif
    </section>
</div>
@endsection    
