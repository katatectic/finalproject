@extends('layouts.app')
@section('title')
    Добавление отчёта
@endsection
@section('content')
<div id="content" class="site-content wrappr">
    <div class="bread" style="margin-top: 10px; margin-bottom: 10px;">
        <a href="{{route('main')}}">Главная</a> /
        <a href="{{route('reports')}}">Отчёты</a> /
        Добавить отчёт
    </div>
    <section class="news">        
        <div id="site-to-top"><i class="fa fa-chevron-up fa-lg"></i></div>
        <div class="grid">
            <h4 style='text-align:center'>Добавить отчёт</h4>
            <div id="primary" class="content-area grid__col grid__col--2-of-3 grid__col--m-2-of-3">  
                <form method="POST" class="form-horizontal" enctype="multipart/form-data" action="{{route('addreport')}}" style='margin:0 auto;max-width:700px'>
                    {{ csrf_field() }}                        
                    <input type="hidden" name="user_id" value="{{Auth::user()->id}}">
                    <div class="form-group">
                        <label for="event_date" class="col-md-4 control-label">Дата создания отчета</label>
                        <div class="col-md-1">
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
                        <label for="exampleInputFile">Чеки</label>
                        <input type="file" name="image[]" id="exampleInputFile" multiple required>
                        <span style="color:red">{{ $errors->first('image') }}</span>
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
            <div id="primary" class="content-area grid__col grid__col--1-of-3 grid__col--m-1-of-3">
                @include('widget')
            </div>
        </div>
    </section>
</div>
@endsection