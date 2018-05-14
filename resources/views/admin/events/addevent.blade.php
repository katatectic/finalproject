@extends('layouts.app')
@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2" style="margin-left: 200px;">
            <div class="panel panel-default">
                <div class="panel-heading">Добавить событие</div><br/><br/>
                <div class="panel-body">
                    <form method="POST" class="form-horizontal" enctype="multipart/form-data" action="{{route('addEvent')}}">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <label for="title" class="col-md-4 control-label">Название события</label>
                            <div class="col-md-6">
                                <input id="title" type="text" class="form-control" name="title" value="{{ old('title') }}"  autofocus>
                                <span style="color:red">{{ $errors->first('title') }}</span>
                            </div>
                        </div>
						<input type="hidden" name="author_id" value="">
                        <div class="form-group">
                            <label for="event_date" class="col-md-4 control-label">Дата проведения события</label>
                            <div class="col-md-6">
                                <input id="event_date" type="date" class="form-control" name="event_date" value="{{ old('event_date') }}"  autofocus>
                                <span style="color:red">{{ $errors->first('event_date') }}</span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="event_hours" class="col-md-1 control-label">Время проведения события</label>
                            <div class="col-md-6">
                                <input id="event_hours" type="text" class="form-control" name="event_hours" value="{{ old('event_hours') }}"  autofocus>
                                <span style="color:red">{{ $errors->first('event_hours') }}</span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="address" class="col-md-4 control-label">Место проведения события</label>
                            <div class="col-md-6">
                                <input id="address" type="text" class="form-control" name="address" value="{{ old('address') }}"  autofocus>
                                <span style="color:red">{{ $errors->first('address') }}</span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="description" class="col-md-4 control-label">Краткое описание события</label>
                            <div class="col-md-6">
                                <textarea class="form-control" id="description" rows='23' name="description" placeholder="Введите краткое описание события" autofocus>{{ old('description') }}</textarea>
                                <span style="color:red">{{ $errors->first('description') }}</span>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="content" class="col-md-4 control-label">Полное описание события</label>
                            <div class="col-md-6">
                                <textarea class="form-control" id="content" rows='23' name="content" placeholder="Введите полное описание события" autofocus>{{ old('content') }}</textarea>
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
                                    Добавить событие
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