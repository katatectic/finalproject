@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2" style="margin-left: 200px;">
            <div class="panel panel-default">
                <div class="form">
                    <form method="POST" action="{{route('editnews', ['id' => $all->id ] ) }}" enctype="multipart/form-data">
                        <div class="form-group">
                            <label for="title">Заголовок новости</label>
                            <input type="text" class="form-control" id="title" name="title" value="{{$all->title}}"> <span style="color:red">{{ $errors->first('title') }}</span>
                        </div>
                        <input type="hidden" name="user_id" value="">
                        <div class="form-group">
                            <label for="event_date">Дата новости</label>
                            <input type="date" class="form-control" id="date" name="date" value="{{$all->date}}"> <span style="color:red">{{ $errors->first('date') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="content">Текст новости</label>
                            <textarea class="form-control" rows='23' name="content">{{$all->content}}</textarea><span style="color:red">{{ $errors->first('content') }}</span>
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
    <hr>
    
</div> <!-- /container -->
@endsection