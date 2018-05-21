@extends('layouts.admin')
@section('content')
<div class="container">
    <div class="row"><br/></br/>
        <div class="col-md-8 col-md-offset-2" style="margin-left: 200px;">
            <div class="panel panel-default">
              <h3 class="box-title" style="text-align:center">Добавляем альбом</h3><br/>
                <div class="panel-body">
                    <form method="POST" class="form-horizontal" enctype="multipart/form-data" action="{{route('album.create')}}">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <label for="name" class="col-md-4 control-label">Название</label>
                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control" placeholder="Введите название альбома" name="name" value="{{ old('name') }}" autofocus>
                                <span style="color:red">{{ $errors->first('name') }}</span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="description" class="col-md-4 control-label">Краткое описание</label>
                            <div class="col-md-6">
                                <textarea class="form-control" id="description" rows='23' name="description" placeholder="Введите краткое описание альбома" autofocus>{{ old('description') }}</textarea>
                                <span style="color:red">{{ $errors->first('description') }}</span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="cover_image" class="col-md-4 control-label">Изображение</label>
                            <div class="col-md-6">
                                <input type="file" name="cover_image" autofocus>
                                <span style="color:red">{{ $errors->first('cover_image') }}</span>
                            </div><br/>
                        </div>
                        <div class="form-group" style="text-align: center">
                            <input name="submit" type="submit" id="submit" class="submit" value="Создать альбом"/>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection