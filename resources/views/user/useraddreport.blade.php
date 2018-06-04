@extends('layouts.app')
@section('title')
	Добавление отчёта
@endsection
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2" style="margin-left: 200px;">
            <div class="panel panel-default">
                
                <div class="panel-body">
                    <form method="POST" class="form-horizontal" enctype="multipart/form-data" action="{{route('addreport')}}">
                        {{ csrf_field() }}                        
                        <input type="hidden" name="user_id" value="{{Auth::user()->id}}">
                        <div class="form-group">
                            <label for="event_date" class="col-md-4 control-label">Дата создания отчета</label>
                            <div class="col-md-6">
                                <input id="date" type="date" class="form-control" name="date" value="{{ old('date') }}"  autofocus>
                                <span style="color:red">{{ $errors->first('date') }}</span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Комитет</label>
                            <select name="student_class_id">
                                <option value="0">Для всех</option>
                                @foreach($user->studentsClasses as $class)
                                    <option value="{{$class->id}}">
                                        {{$classesNumbers()[$class->id]}}-{{$class->letter_class}}
                                    </option>
                                @endforeach
                            </select>
                            <span style="color:red">{{ $errors->first('student_class_id') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="content" class="col-md-4 control-label">Текст отчета</label>
                            <div class="col-md-6">
                                <textarea class="form-control" id="content" rows='23' name="content" placeholder="Введите текст отчета" autofocus>{{ old('content') }}</textarea>
                                <span style="color:red">{{ $errors->first('content') }}</span>
                            </div>
                        </div>
                        <div class="form-group">
                            <input name="submit" type="submit" id="submit" class="submit" value="Добавить отчет"/>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection