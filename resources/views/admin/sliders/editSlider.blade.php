@extends('layouts.admin')
@section('content')
<div class="content-wrapper">
    <section class="content-header">
        <h1>
            Редактировать слайдер
        </h1>
    </section>
    <section class="content">
        <form enctype="multipart/form-data" action="{{route('slider.edit', ['id' => $slider->id ] ) }}" class="contact_form" method="POST" >
            <div class="box">
                <div class="box-body">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Название</label>
                            <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Название слайдера" name="title" value="{{$slider->title}}">
                            <span style="color:red">{{ $errors->first('title') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputFile">Изображение</label>
                            <input type="file" name="photo" id="exampleInputFile">
                            <span style="color:red">{{ $errors->first('photo') }}</span>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <label>Полный текст</label>
                            <textarea name="description" placeholder="Краткое описание" cols="30" rows="10" class="form-control">{{$slider->description}}</textarea>
                            <span style="color:red">{{ $errors->first('description') }}</span>
                        </div>
                        <div class="box-footer">
                            <button class="btn btn-success pull-left bg-orange" onclick="window.history.go(-1); return false;">Назад</button>
                            <button class="btn btn-success pull-right bg-orange">Сохранить</button>
                        </div>
                    </div>
                    {{ csrf_field() }}
                </div>
            </div>
        </form>
    </section>
</div>
@endsection