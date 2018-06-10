@extends('layouts.app')
@section('title')
Добавить изображение в альбом
@endsection
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2" style="margin-left: 200px;">
            <div class="panel panel-default">
                <div class="panel-heading">Добавить изобажение</div><br/><br/>
                <div class="panel-body">
                    <form method="POST" class="form-horizontal" enctype="multipart/form-data" action="{{URL::route('add_image_to_album', $album->id)}}">
                        {{ csrf_field() }}
                        <input type="hidden" name="album_id" value="{{$album->id}}" />
                        <legend>Добавить изображение в альбом {{$album->name}}</legend>
                        <div class="form-group">
                            <label for="image" class="col-md-4 control-label">Изображение</label>
                            <div class="col-md-6">
                                <input type="file" name="image[]" multiple>
                                <span style="color:red">{{ $errors->first('image') }}</span>
                            </div><br/>
                        </div>
                        <div class="form-group">
                            <input name="submit" type="submit" id="submit" class="submit" value="Добавить изображение"/>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection