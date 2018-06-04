@extends('layouts.admin')
@section('title')
    Добавление события
@endsection
@section('content')
<div class="content-wrapper">
    <section class="content-header">
        <h1>
            Добавить событие
        </h1>
    </section>
    <section class="content">
        <form method="POST" class="form-horizontal" enctype="multipart/form-data" action="{{route('admin.event.store')}}" >
            <div class="box">
                <div class="box-body">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Название события</label>
                            <input type="text" class="form-control" placeholder="Название события" name="title" value="{{ old('title') }}">
                            <span style="color:red">{{ $errors->first('title') }}</span>
                        </div>
                        <input type="hidden" name="user_id" value="{{Auth::user()->id}}">
                        <div class="form-group">
                            <label>Дата проведения события</label>
                            <input type="date" class="form-control" placeholder="Дата проведения события" name="event_date" value="{{ old('event_date') }}">
                            <span style="color:red">{{ $errors->first('event_date') }}</span>
                        </div>
                        <div class="form-group">
                            <label>Время проведения события</label>
                            <input type="text" class="form-control" placeholder="Время проведения события" name="event_hours" value="{{ old('event_hours') }}">
                            <span style="color:red">{{ $errors->first('event_hours') }}</span>
                        </div>
                        <div class="form-group">
                            <label>Место проведения события</label>
                            <input type="text" class="form-control" placeholder="Место проведения события" name="address" value="{{ old('address') }}">
                            <span style="color:red">{{ $errors->first('address') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputFile">Изображение</label>
                            <input type="file" name="photo" id="exampleInputFile">
                            <span style="color:red">{{ $errors->first('photo') }}</span>
                        </div>
                        <div class="form-group">
                            <label>Комитет
                                <select name="student_class_id">
                                    <option value="0">Общие мероприятие</option>
                                    @foreach($studentsClasses as $class)
                                        @if(Auth::user()->role == 1 || Auth::user()->studentsClasses->contains('id', $class['id']))
                                            <option value="{{$class->id}}">
                                                {{ $classesNumbers()[$class->id] }} - {{$class->letter_class}}
                                            </option>
                                        @endif
                                    @endforeach
                                </select>
                            </label>
                            <span style="color:red">{{ $errors->first('student_class_id') }}</span>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <label>Краткое описание </label>
                            <textarea name="description" placeholder="Краткое описание события" cols="30" rows="10" class="form-control">{{ old('description') }}</textarea>
                            <span style="color:red">{{ $errors->first('description') }}</span>
                        </div>
                        <div class="form-group">
                            <label>Полное описание</label>
                            <textarea name="content" placeholder="Полное описание события" cols="30" rows="10" class="form-control">{{ old('content') }}</textarea>
                            <span style="color:red">{{ $errors->first('content') }}</span>
                        </div>
                        <div class="box-footer">
                            <button class="btn btn-success pull-left bg-orange"onclick="window.history.go(-1); return false;">Назад</button>
                            <button class="btn btn-success pull-right bg-orange">Добавить событие</button>
                        </div>
                    </div>
                    {{ csrf_field() }}
                </div>
            </div>
        </form>
    </section>
</div>
@endsection