@extends('layouts.app')
@section('title')
    Добавление новости
@endsection
@section('content')
<div id="content" class="site-content wrappr">
    <div class="bread" style="margin-top: 10px; margin-bottom: 10px;">
        <a href="{{route('main')}}">Главная</a> /
        <a href="{{route('news')}}">Новости</a> /
        Добавить новость
    </div>
    <section class="news">        
        <div id="site-to-top"><i class="fa fa-chevron-up fa-lg"></i></div>
        <div class="grid">
            <h4 style='text-align:center'>Добавить новость</h4>
            <div id="primary" class="content-area grid__col grid__col--2-of-3 grid__col--m-2-of-3">  
                <form method="POST" class="form-horizontal" enctype="multipart/form-data" action="{{route('user.addNews')}}" style='margin:0 auto;max-width:700px'>
                    {{ csrf_field() }}
                    <div class="form-group">
                        <label for="title" class="col-md-4 control-label">Заголовок</label>
                        <div class="col-md-6">
                            <input id="title" type="text" class="form-control" name="title" value="{{ old('title') }}"  autofocus>
                            <span style="color:red">{{ $errors->first('title') }}</span>
                        </div>
                    </div>
                    <input type="hidden" name="user_id" value="{{Auth::user()->id}}">
                    <div class="form-group">
                        <label for="date" class="col-md-4 control-label">Дата новости</label>
                        <div class="col-md-6">
                            <input id="date" type="datetime-local" class="form-control" name="date" value="{{ old('date') }}"  autofocus>
                            <span style="color:red">{{ $errors->first('date') }}</span>
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Комитет</label>
                        <select name="student_class_id">
                            <option value="0">Общая новость</option>
                            @foreach($user->studentsClasses as $class)
                            <option value="{{$class->id}}">
                                {{$classesNumbers()[$class->id]}}-{{$class->letter_class}}
                            </option>
                            @endforeach
                        </select>
                        <span style="color:red">{{ $errors->first('student_class_id') }}</span>
                    </div>
                    <div class="form-group">
                        <label for="description" class="col-md-4 control-label">Краткое описание новости</label>
                        <div class="col-md-6">
                            <textarea class="form-control" id="description" rows='23' name="description" placeholder="Краткое описание новости" autofocus>{{ old('description') }}</textarea>
                            <span style="color:red">{{ $errors->first('description') }}</span>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="content" class="col-md-4 control-label">Текст новости</label>
                        <div class="col-md-6">
                            <textarea class="form-control" id="content" rows='23' name="content" placeholder="Введите текст новости" autofocus>{{ old('content') }}</textarea>
                            <span style="color:red">{{ $errors->first('content') }}</span>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="photo" class="col-md-4 control-label">Изображение</label>
                        <div class="col-md-6">
                            <input id="photo" type="file" class="form-control" name="photo" value="{{ old('photo') }}"  autofocus>
                            <span style="color:red">{{ $errors->first('photo') }}</span>
                        </div><br/>
                    </div>
                    <div class="form-group">
                        <input name="submit" type="submit" id="submit" class="submit" value="Добавить новость"/>
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