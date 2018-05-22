@extends('layouts.app')
@section('content')
<div class="content">
    <div class="row" style="margin-left:50px">
        @if($slider)
        <div class="col-lg-8 col-md-8 col-sm-8">
            <div class="left_content">
				<div class="image-lightbox">
                        <a href="{{asset('images/sliders/'.$slider->photo)}}" data-lightbox="{{asset('images/sliders/'.$slider->photo)}}" title="{{ $slider->title }}">
                            <img width="500" height="500" src="{{asset('images/sliders/'.$slider->photo)}}" class="attachment-full size-full wp-post-image" alt="{{ $slider->title }}"/>
                        </a>
                    </div>
                <header class="entry-header">
                    <h1 class="entry-title">{{$slider->title}}</h1>
                    <p>{{$slider->description}}</p>
            </div>
            <a href="{{ route('slider.edit',['id'=>$slider->id]) }}" class="btn btn-success pull-left">Редактировать слайдер</a>
            <a href="{{route('slider.destroy',$slider->id)}}" onclick="return confirm('Удалить слайдер?')" class="btn btn-success pull-right" style="float:right">Удалить слайдер</a>
			  </div>
            @endif
      </div>
	  </div>
        @endsection    
