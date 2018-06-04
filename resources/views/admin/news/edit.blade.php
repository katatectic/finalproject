@extends('layouts.admin')
@section('title')
	Редактировать {{$all->title}}
@endsection
@section('content')
<div class="content-wrapper">
    <section class="content-header">
        <h1>
            Редактировать новость
        </h1>
    </section>
    <section class="content">
        <form method="post" class="form-horizontal" enctype="multipart/form-data" action="{{route('article.update', ['id' => $all->id ] ) }}" >
            {{ csrf_field() }}
            <div class="box">
                <div class="box-body">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Название новости
                                <input type="text" class="form-control" placeholder="Название новости" name="title"
                                       value="@if(!empty($errors->first('*'))){{old('title')}}@else{{$all->title}}@endif">
                                <span style="color:red">{{ $errors->first('title') }}</span>
                            </label>
                        </div>
                        <div class="form-group">
                            <label>Дата </label>
                            <input type="datetime-local" class="form-control" placeholder="Дата новости" name="date"
                                   value="@if(!empty($errors->first('*'))){{old('date')}}@else{{$all->date}}@endif">
                            <span style="color:red">{{ $errors->first('date') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputFile">Изображение</label>
                            @isset($all->photo)
                                <img width="100" src="{{asset('images/news/'.$all->photo)}}" class="attachment-full size-full wp-post-image"/>
                            @endif
                            <input type="file" name="photo" id="exampleInputFile">
                            <span style="color:red">{{ $errors->first('photo') }}</span>
                        </div>
                        <div class="form-group">
                            <label>
                                Комитет
                                <select name="student_class_id">
                                    <option value="0">Общая новость</option>
                                    @foreach($studentsClasses as $class)
                                        @if(Auth::user()->role == 1 || Auth::user()->studentsClasses->contains('id', $class['id']))
                                            <option value="{{$class->id}}" @if($class->id == $all->studentClass['id']) selected @endif>
                                                {{ $classesNumbers()[$class->id] }} - {{$class->letter_class}}
                                            </option>
                                        @endif
                                    @endforeach
                                </select>
                                <span style="color:red">{{ $errors->first('student_class_id') }}</span>
                            </label>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <label>Краткое описание</label>
                            <textarea name="description" placeholder="Краткое описание новости" cols="30" rows="10" class="form-control">@if(!empty($errors->first('*'))){{old('description')}}@else{{$all->description}}@endif</textarea>
                            <span style="color:red">{{ $errors->first('description') }}</span>
                        </div>
                        <div class="form-group">
                            <label>Полное описание</label>
                            <textarea name="content" placeholder="Полное описание события" cols="30" rows="10" class="form-control">@if(!empty($errors->first('*'))){{old('content')}}@else{{$all->content}}@endif</textarea>
                            <span style="color:red">{{ $errors->first('content') }}</span>
                        </div>
                        <div class="box-footer">
                            <button class="btn btn-success pull-left bg-orange"onclick="window.history.go(-1); return false;">Назад</button>
                            <button class="btn btn-success pull-right bg-orange">Сохранить</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </section>
</div>
@endsection