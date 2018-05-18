@extends('layouts.app')
@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2" style="margin-left: 200px;">
            <div class="panel panel-default">
                <div class="panel-heading">Добавить изобажение</div><br/><br/>
                <div class="panel-body">
				
                    <form method="POST" class="form-horizontal" enctype="multipart/form-data" action="{{URL::route('add_image_to_album')}}">
                        {{ csrf_field() }}
						<input type="hidden" name="album_id" value="{{$album->id}}" />
						<legend>Добавить изображение в альбом {{$album->name}}</legend>
                        <div class="form-group">
                            <label for="description" class="col-md-4 control-label">Краткое описание</label>
                            <div class="col-md-6">
                                <textarea class="form-control" id="description" rows='23' name="description" placeholder="Введите краткое описание события" autofocus>{{ old('description') }}</textarea>
                                <span style="color:red">{{ $errors->first('description') }}</span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="image" class="col-md-4 control-label">Изображение</label>
                            <div class="col-md-6">
                                <input id="image" type="file" class="form-control" name="image" value="{{ old('image') }}"  autofocus>
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