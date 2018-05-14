@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2" style="margin-left: 200px;">
            <div class="panel panel-default">
        <div class="form">
            <form method="POST" action="{{route('editevent', ['id' => $all->id ] ) }}" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="title">Название события</label>
                    <input type="text" class="form-control" id="title" name="title" value="{{$all->title}}"> <span style="color:red">{{ $errors->first('title') }}</span>
                </div>
				<input type="hidden" name="author_id" value="">
                <div class="form-group">
                    <label for="event_date">Дата проведения события</label>
                    <input type="date" class="form-control" id="event_date" name="event_date" value="{{$all->event_date}}"> <span style="color:red">{{ $errors->first('event_date') }}</span>
                </div>
                <div class="form-group">
                    <label for="event_hours">Время проведения события</label>
                    <input type="text" class="form-control" id="event_hours" name="event_hours"  value="{{ $all->event_hours }}"> <span style="color:red">{{ $errors->first('event_hours') }}</span>
                </div>
                <div class="form-group">
                    <label for="address">Место проведения события</label>
                    <textarea class="form-control" name="address">{{$all->address}}</textarea> <span style="color:red">{{ $errors->first('address') }}</span>
                </div>
				<div class="form-group">
                    <label for="description">Краткое описание события</label>
                    <textarea class="form-control" name="description">{{$all->description}}</textarea> <span style="color:red">{{ $errors->first('description') }}</span>
                </div>
                <div class="form-group">
                    <label for="content">Полное описание события</label>
                    <textarea class="form-control" rows='23' name="content">{{$all->content}}</textarea><span style="color:red">{{ $errors->first('content') }}</span>
                </div>
                <label class="btn btn-default btn-file">
                    Загрузите изображение <input type="file" name="photo" style="display: none;">
                </label><span style="color:red">{{ $errors->first('photo') }}</span><br/><br/><button type="submit" class="btn btn-primary">Отправить</button>
                {{ csrf_field() }}
            </form>
			</div>
			</div>
        </div>
    </div>
    <hr>
    <footer>
        <p>&copy; 2018 Сайт новостей</p>
    </footer>
</div> <!-- /container -->
@endsection