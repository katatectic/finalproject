@extends('layouts.admin')
@section('content')
<div class="content-wrapper">
    <section class="content-header">
        <h1>
            Просмотр заявки
        </h1>
    </section>
    <section class="content">
        @if($feedback)
        <div class="box">
            <div class="box-body">
                <div class="col-md-6">
                    <div class="form-group">
                        <h2>Имя отправителя: {{ $feedback->name}}</h2>
                    </div>
                    <div class="form-group">
                        <h2>Почта отправителя: {{ $feedback->email}}</h2>
                    </div>
                </div>
                <div class="col-md-12">
                    <h2>Сообщение</h2>
                    </p>{{ $feedback->message}}</p>
                    <div class="box-footer">
                        <button class="btn btn-success pull-left bg-orange" onclick="window.history.go(-1); return false;">Назад</button>
                        <a class="btn btn-success bg-orange" href="{{ route('feedback.reply',['id'=>$feedback->id]) }}">Ответить на заявку</a>
                        <a class="btn btn-success pull-right bg-orange" href="{{ route('feedback.reply',['id'=>$feedback->id]) }}" onclick="return confirm('Удалить заявку?')">Удалить заявку</a>
                    </div>
                </div>
            </div>
        </div>
        @endif
    </section>
</div>
@endsection    
