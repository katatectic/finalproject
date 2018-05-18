@extends('layouts.app')
@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2" style="margin-left: 200px;">
            <div class="panel panel-default">
                <div class="panel-heading">Добавить альбом</div><br/><br/>
                <div class="panel-body">
                    <form method="POST" class="form-horizontal" enctype="multipart/form-data" action="{{route('albumcreate')}}">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <label for="name" class="col-md-4 control-label">Название</label>
                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}"  autofocus>
                                <span style="color:red">{{ $errors->first('name') }}</span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="description" class="col-md-4 control-label">Краткое описание</label>
                            <div class="col-md-6">
                                <textarea class="form-control" id="description" rows='23' name="description" placeholder="Введите краткое описание события" autofocus>{{ old('description') }}</textarea>
                                <span style="color:red">{{ $errors->first('description') }}</span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="cover_image" class="col-md-4 control-label">Изображение</label>
                            <div class="col-md-6">
                                <input id="cover_image" type="file" class="form-control" name="cover_image" value="{{ old('cover_image') }}"  autofocus>
                                <span style="color:red">{{ $errors->first('cover_image') }}</span>
                            </div><br/>
                        </div>
                        <div class="form-group">
                            <input name="submit" type="submit" id="submit" class="submit" value="Добавить событие"/>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection