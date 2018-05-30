@extends('layouts.admin')
@section('title')
	Ответ пользователю {{$feedback->name}}
@endsection
@section('content')
<div class="content-wrapper">
    <section class="content-header">
        <h1>
            Ответить на заявку
        </h1>
    </section>
    <section class="content">
        @if($feedback)
        <h3>Сообщение от пользователя:</h3>
        <h3>{{$feedback->message}}</h4>
            <form method="POST" class="form-horizontal" enctype="multipart/form-data" action="{{route('feedback.reply',['id'=>$feedback->id])}}" >
                <div class="box">
                    <div class="box-body">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Имя пользователя</label>
                                <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Имя пользователя" name="name" value="{{$feedback->name}}">
                                <span style="color:red">{{ $errors->first('name') }}</span>
                            </div>
                            <div class="form-group">
                                <label>Почта пользователя</label>
                                <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Почта пользователя" name="email" value="{{$feedback->email}}">
                                <span style="color:red">{{ $errors->first('email') }}</span>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Сообщение пользователю</label>
                                <textarea name="message" placeholder="Краткое описание" id="" cols="30" rows="10" class="form-control">{{ old('message') }}</textarea>
                                <span style="color:red">{{ $errors->first('message') }}</span>
                            </div>
                            <div class="box-footer">
                                <button class="btn btn-success pull-left bg-orange"onclick="window.history.go(-1); return false;">Назад</button>
                                <button class="btn btn-success pull-right bg-orange">Отправить сообщение</button>
                            </div>
                        </div>
                        {{ csrf_field() }}
                    </div>
                </div>
            </form>
            @endif
    </section>
</div>
@endsection  
