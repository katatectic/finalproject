@extends('layouts.app')
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
                            <label for="event_date" class="col-md-4 control-label">Дата новости</label>
                            <div class="col-md-6">
                                <input id="date" type="date" class="form-control" name="date" value="{{ old('date') }}"  autofocus>
                                <span style="color:red">{{ $errors->first('date') }}</span>
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
                            <label for="photo" class="col-md-4 control-label">Добавить фото</label>
                            <div class="col-md-6">
                                <input id="photo" type="file" style="display: none;" class="form-control" name="photo" value="{{ old('photo') }}">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Добавить новость
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection