@extends('layouts.admin')
@section('title')
    Список альбомов
@endsection
@section('content')
<div class="content-wrapper">
    <section class="content-header">
        <h1>Альбомы</h1>
    </section>
    <section class="content">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">Всего альбомов: {{$albumsCount}}</h3>
            </div>
            <div class="box-body">
                <div class="form-group">
                    <a href="{{route('album.create')}}" class="btn btn-primary mb1 bg-orange">Добавить альбом</a>
                </div>
                <table id="example1" class="table table-bordered table-striped">
                    <thead>		
                        <tr>
                            <th>Название</th>
                            <th>Краткое описание</th>
                            <th>Изображение</th>
                            <th>Добавить фото в альбом</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($albums as $album)
                        <tr>
                            <td>{{$album->name}}</td>
                            <td>{{str_limit($album->description,20)}}</td>
                            <td>
                                <div class="image-lightbox">
                                    <a href="{{asset('images/albums/'.$album->cover_image)}}" data-lightbox="{{asset('images/albums/'.$album->cover_image)}}" title="{{ $album->name }}">
                                        <img width="100" src="{{asset('images/albums/'.$album->cover_image)}}" class="attachment-full size-full wp-post-image" alt="{{ $album->name }}"/>
                                    </a>
                                </div>
                            </td>
                            <td><a href="{{route('add_image',['id'=>$album->id])}}" class="fa fa-plus"></a></td>
                            <td>
                                <a href="{{route('album.show',['id'=>$album->id])}}" class="fa fa-eye"></a>
                                <a href="{{route('album.edit', ['id' => $album->id ] ) }}" class="fa fa-pencil"></a>
                                <a href="{{route('album.destroy',$album->id)}}" onclick="return confirm('Удалить альбом?')" class="fa fa-remove"></a>
                            </td>
                        </tr>
                        @endforeach
                        </tfoot>
                </table>		  
            </div>
            {{$albums->links()}}
        </div>
    </section>
</div>
@endsection  