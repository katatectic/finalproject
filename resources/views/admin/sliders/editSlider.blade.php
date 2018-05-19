@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2" style="margin-left: 200px;">
            <div class="panel panel-default">
                <div class="form">
                    <form method="POST" action="{{route('slider.edit', ['id' => $slider->id ] ) }}" enctype="multipart/form-data">
                        <div class="form-group">
                            <label for="title">Название</label>
                            <input type="text" class="form-control" id="title" name="title" value="{{$slider->title}}"> <span style="color:red">{{ $errors->first('title') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="description">Краткое описание</label>
                            <textarea class="form-control" name="description">{{$slider->description}}</textarea> <span style="color:red">{{ $errors->first('description') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="photo" class="col-md-4 control-label">Изображение</label>
                            <div class="col-md-6">
                                <input id="photo" type="file" class="form-control" name="photo"autofocus>
                                <span style="color:red">{{ $errors->first('photo') }}</span>
                            </div><br/>
                        </div>
                        <button type="submit" class="btn btn-primary">Отправить</button>
                        {{ csrf_field() }}
                    </form>
                </div>
            </div>
        </div>
    </div>
</div> 
@endsection