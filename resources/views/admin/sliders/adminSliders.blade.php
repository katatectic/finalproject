@extends('layouts.admin')
@section('title')
    Слайдеры
@endsection
@section('content')
<div class="content-wrapper">
    <section class="content-header">
        <h1>Слайдеры</h1>
    </section>
    <section class="content">
        <div class="box">
            <div class="box-body">
                <div class="form-group">
                    <a href="{{ route('slider.create')}}" class="btn btn-success bg-orange">Добавить слайдер</a>
                </div>
                @if(session('status'))
                    <div class="alert alert-success alert-dismissible" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    {{session('status')}}
                </div>
                @endif
                <table id="example1" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>Название</th>
                            <th>Краткое описание</th>
                            <th>Изображение</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($sliders as $slider)
                        <tr>
                            <td>{{$slider->title}}</td>
                            <td>{{str_limit($slider->description,20)}}</td>
                            <td>
                                <div class="image-lightbox">
                                    <a href="{{asset('images/sliders/'.$slider->photo)}}" data-lightbox="{{asset('images/sliders/'.$slider->photo)}}" title="{{ $slider->title }}">
                                        <img width="100" src="{{asset('images/sliders/'.$slider->photo)}}" class="attachment-full size-full wp-post-image" alt="{{ $slider->title }}"/>
                                    </a>
                                </div>
                            </td>
                            <td>
                                <a href="{{ route('slider.show',['id'=>$slider->id]) }}" class="fa fa-eye"></a>
                                <a href="{{ route('slider.edit',['id'=>$slider->id]) }}" class="fa fa-pencil"></a>
                                <a href="{{route('slider.destroy',$slider->id)}}" onclick="return confirm('Удалить слайдер?')" class="fa fa-remove"></a>
                            </td>
                        </tr>
                        @endforeach
                        </tfoot>
                </table>
            </div>
            {{$sliders->links()}}
        </div>
    </section>
</div>
@endsection  
