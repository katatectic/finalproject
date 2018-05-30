@extends('layouts.admin')
@section('title')
	Создать альбом
@endsection
@section('content')
<div class="content-wrapper">
    <section class="content-header">
        <h1>
            Добавить альбом
        </h1>
    </section>
    <section class="content">
        <form method="POST" class="form-horizontal" enctype="multipart/form-data" action="{{route('album.create')}}" >
            <div class="box">
                <div class="box-body">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Название</label>
                            <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Название альбома" name="name" value="{{ old('name') }}">
                            <span style="color:red">{{ $errors->first('name') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputFile">Изображение</label>
                            <input type="file" name="cover_image" id="exampleInputFile">
                            <span style="color:red">{{ $errors->first('cover_image') }}</span>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <label>Краткое описание</label>
                            <textarea name="description" placeholder="Краткое описание" id="" cols="30" rows="10" class="form-control">{{ old('description') }}</textarea>
                            <span style="color:red">{{ $errors->first('description') }}</span>
                        </div>
                        <div class="box-footer">
                            <button class="btn btn-success pull-left bg-orange"onclick="window.history.go(-1); return false;">Назад</button>
                            <button class="btn btn-success pull-right bg-orange">Добавить альбом</button>
                        </div>
                    </div>
                    {{ csrf_field() }}
                </div>
            </div>
        </form>
    </section>
</div>
@endsection