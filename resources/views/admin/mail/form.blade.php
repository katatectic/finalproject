@extends('layouts.admin')
@section('title')
    Отправка почты
@endsection
@section('content')
<div class="content-wrapper">
    <section class="content-header">
        <h1>
            Отправка почты
        </h1>
    </section>
    <section class="content">
        <form method="POST" class="form-horizontal" enctype="multipart/form-data" action="{{route('sendMail')}}" >
            <div class="box">
                <div class="box-body">
                    <div class="form-group">
                        <label>Имя</label>
                        <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Имя получателя" name="name" value="{{ old('name') }}">
                        <span style="color:red">{{ $errors->first('name') }}</span>
                    </div>
                    <div class="form-group">
                        <label>Почта</label>
                        <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Почта получателя" name="email" value="{{ old('email') }}">
                        <span style="color:red">{{ $errors->first('email') }}</span>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <label>Сообщение</label>
                            <textarea name="message" placeholder="Сообщение" cols="30" rows="10" class="form-control">{{ old('message') }}</textarea>
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
    </section>
</div>
@endsection  