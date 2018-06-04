@extends('layouts.admin')
@section('title')
	Добавить отчёт
@endsection
@section('content')
<div class="content-wrapper">
    <section class="content-header">
        <h1>
            Добавить отчёт
        </h1>
    </section>
    <section class="content">
        <form method="POST" class="form-horizontal" enctype="multipart/form-data" action="{{route('admin.report.store')}}" >
            <div class="box">
                <div class="box-body">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Дата отчёта</label>
                            <input type="date" class="form-control" id="exampleInputEmail1" name="date" value="{{ old('date') }}">
                            <span style="color:red">{{ $errors->first('date') }}</span>
                        </div>
                    </div>
                    <div class="col-md-7">
                        <label>Комитет
                            <select name="student_class_id">
                                <option value="0">Для всех</option>
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
                    <input type="hidden" name="user_id" value="{{Auth::user()->id}}">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label>На что потратили</label>
                            <textarea name="content" placeholder="На что потратили" id="" cols="30" rows="10" class="form-control">{{ old('content') }}</textarea>
                            <span style="color:red">{{ $errors->first('content') }}</span>
                        </div>
                        <div class="box-footer">
                            <button class="btn btn-success pull-left bg-orange"onclick="window.history.go(-1); return false;">Назад</button>
                            <button class="btn btn-success pull-right bg-orange">Добавить отчёт</button>
                        </div>
                    </div>
                    {{ csrf_field() }}
                </div>
            </div>
        </form>
    </section>
</div>
@endsection