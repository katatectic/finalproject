@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2" style="margin-left: 200px;">
            <div class="panel panel-default">
                <div class="form">
                    <form method="POST" action="{{route('album.edit', ['id' => $album->id ] ) }}" enctype="multipart/form-data">
                        <div class="form-group">
                            <label for="title">Название альбома</label>
                            <input type="text" class="form-control" id="name" name="name" value="{{$album->name}}"> <span style="color:red">{{ $errors->first('name') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="description">Краткое описание альбома</label>
                            <textarea class="form-control" name="description">{{$album->description}}</textarea> <span style="color:red">{{ $errors->first('description') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="cover_image" class="col-md-4 control-label">Изображение</label>
                            <div class="col-md-6">
                                <input id="cover_image" type="file" class="form-control" name="cover_image"autofocus>
                                <span style="color:red">{{ $errors->first('cover_image') }}</span>
                            </div><br/>
                        </div>
                        <button type="submit" class="btn btn-primary">Отправить</button>
                        {{ csrf_field() }}
                    </form>
                </div>
            </div>
        </div>
    </div>
    <hr>
</div> <!-- /container -->
@endsection