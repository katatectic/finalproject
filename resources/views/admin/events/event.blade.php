@extends('layouts.app')
@section('content')

    <div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2" style="margin-left: 200px;">
            <div class="panel panel-default">
                <div class="panel-heading">Добавить событие</div><br/><br/>
                <div class="panel-body">
                     <form method="POST" enctype="multipart/form-data" action="{{route('addEvent')}}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('title') ? ' has-error' : '' }}">
                            <label for="title" class="col-md-4 control-label">Название события</label>

                            <div class="col-md-6">
                                <input id="title" type="text" class="form-control" name="title" value="{{ old('title') }}"  autofocus>

                                @if ($errors->has('title'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('title') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('event_date') ? ' has-error' : '' }}">
                            <label for="event_date" class="col-md-4 control-label">Дата проведения события</label>

                            <div class="col-md-6">
                                <input id="event_date" type="date" class="form-control" name="event_date" value="{{ old('event_date') }}" required autofocus>

                                @if ($errors->has('event_date'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('event_date') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
							 <div class="form-group{{ $errors->has('event_hours') ? ' has-error' : '' }}">
                            <label for="event_hours" class="col-md-4 control-label">Дата проведения события</label>

                            <div class="col-md-6">
                                <input id="event_hours" type="text" class="form-control" name="event_hours" value="{{ old('event_hours') }}" required autofocus>

                                @if ($errors->has('event_hours'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('event_hours') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
						<div class="form-group{{ $errors->has('address') ? ' has-error' : '' }}">
                            <label for="address" class="col-md-4 control-label">Место проведения события</label>

                            <div class="col-md-6">
                                <input id="address" type="text" class="form-control" name="address" value="{{ old('address') }}" required autofocus>

                                @if ($errors->has('address'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('address') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('description') ? ' has-error' : '' }}">
                            <label for="description" class="col-md-4 control-label">Краткое описание события</label>

                            <div class="col-md-6">
								<textarea class="form-control" id="description" rows='23' name="description" placeholder="Введите краткое описание события" autofocus>{{ old('description') }}</textarea>
                                @if ($errors->has('description'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('description') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('content') ? ' has-error' : '' }}">
                            <label for="content" class="col-md-4 control-label">Полное описание события</label>

                            <div class="col-md-6">
								<textarea class="form-control" id="content" rows='23' name="content" placeholder="Введите краткое описание события" autofocus>{{ old('content') }}</textarea>
                                @if ($errors->has('content'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('content') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
						<div class="form-group{{ $errors->has('photo') ? ' has-error' : '' }}">
                            <label for="photo" class="col-md-4 control-label">Добавить фото</label>
   
                            <div class="col-md-6">
                                <input id="photo" type="file" style="display: none;" class="form-control" name="photo" value="{{ old('photo') }}" required>

                                @if ($errors->has('photo'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('photo') }}</strong>
                                    </span>
                                @endif
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