@extends('layouts.app')
@section('title')
	Добавление новости
@endsection
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2" style="margin-left: 200px;">
            <div class="panel panel-default">
                <div class="panel-heading">Добавить новость</div><br/><br/>
                <div class="panel-body">
                    <form method="POST" class="form-horizontal" enctype="multipart/form-data" action="{{route('addNews')}}">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <label for="title" class="col-md-4 control-label">Заголовок</label>
                            <div class="col-md-6">
                                <input id="title" type="text" class="form-control" name="title" value="{{ old('title') }}"  autofocus>
                                <span style="color:red">{{ $errors->first('title') }}</span>
                            </div>
                        </div>
                        <input type="hidden" name="user_id" value="{{Auth::user()->id}}">
                        <div class="form-group">
                            <label for="date" class="col-md-4 control-label">Дата новости</label>
                            <div class="col-md-6">
                                <input id="date" type="datetime-local" class="form-control" name="date" value="{{ old('date') }}"  autofocus>
                                <span style="color:red">{{ $errors->first('date') }}</span>
                            </div>
                        </div>
						<div class="form-group">
                            <label for="description" class="col-md-4 control-label">Краткое описание новости</label>
                            <div class="col-md-6">
                                <textarea class="form-control" id="description" rows='23' name="description" placeholder="Краткое описание новости" autofocus>{{ old('description') }}</textarea>
                                <span style="color:red">{{ $errors->first('description') }}</span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="content" class="col-md-4 control-label">Текст новости</label>
                            <div class="col-md-6">
                                <textarea class="form-control" id="content" rows='23' name="content" placeholder="Введите текст новости" autofocus>{{ old('content') }}</textarea>
                                <span style="color:red">{{ $errors->first('content') }}</span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="photo" class="col-md-4 control-label">Изображение</label>
                            <div class="col-md-6">
                                <input id="photo" type="file" class="form-control" name="photo" value="{{ old('photo') }}"  autofocus>
                                <span style="color:red">{{ $errors->first('photo') }}</span>
                            </div><br/>
                        </div>
                        <div class="form-group">
                            <input name="submit" type="submit" id="submit" class="submit" value="Добавить новость"/>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection