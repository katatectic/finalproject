@extends('layouts.admin')
@section('title')
	Редактировать событие {{$event->title}}
@endsection
@section('content')
<div class="content-wrapper">
    <section class="content-header">
        <h1>
            Редактировать событие
        </h1>
    </section>
    <section class="content">
        <form method="POST" class="form-horizontal" enctype="multipart/form-data" action="{{route('event.edit', ['id' => $event->id ] ) }}" >
            <div class="box">
                <div class="box-body">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Название события</label>
                            <input type="text" class="form-control" placeholder="Название события" name="title" value="{{$event->title}}">
                            <span style="color:red">{{ $errors->first('title') }}</span>
                        </div>
                        <input type="hidden" name="user_id" value="{{Auth::user()->id}}">
                        <div class="form-group">
                            <label>Дата проведения события</label>
                            <input type="date" class="form-control" placeholder="Дата проведения события" name="event_date" value="{{ $event->event_date }}">
                            <span style="color:red">{{ $errors->first('event_date') }}</span>
                        </div>
                        <div class="form-group">
                            <label>Время проведения события</label>
                            <input type="text" class="form-control" placeholder="Время проведения события" name="event_hours" value="{{ $event->event_hours }}">
                            <span style="color:red">{{ $errors->first('event_hours') }}</span>
                        </div>
                        <div class="form-group">
                            <label>Место проведения события</label>
                            <input type="text" class="form-control" placeholder="Место проведения события" name="address" value="{{ $event->address }}">
                            <span style="color:red">{{ $errors->first('address') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputFile">Изображение</label>
                            <input type="file" name="photo" id="exampleInputFile">
                            <span style="color:red">{{ $errors->first('photo') }}</span>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <label>Краткое описание </label>
                            <textarea name="description" placeholder="Краткое описание события" cols="30" rows="10" class="form-control">{{$event->description}}</textarea>
                            <span style="color:red">{{ $errors->first('description') }}</span>
                        </div>
                        <div class="form-group">
                            <label>Полное описание</label>
                            <textarea name="content" placeholder="Полное описание события" cols="30" rows="10" class="form-control">{{$event->content}}</textarea>
                            <span style="color:red">{{ $errors->first('content') }}</span>
                        </div>
                        <div class="box-footer">
                            <button class="btn btn-success pull-left bg-orange"onclick="window.history.go(-1); return false;">Назад</button>
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