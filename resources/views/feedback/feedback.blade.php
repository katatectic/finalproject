@extends('layouts.app')
@section('title')
    Обратная связь
@endsection
@section('content')
<div id="content" class="site-content wrappr">
    <div class="row">
        <div class="bread">
            <a href="{{route('main')}}">Главная</a> / Обратная связь
        </div>
        <div id="site-to-top"><i class="fa fa-chevron-up fa-lg"></i></div>
        <div class="grid">
            <div id="primary" class="content-area grid__col grid__col--2-of-3">
                <div class="left_content">
                    <div class="contact_area">
                        <h4 style='text-align:center'>Свяжитесь с нами и мы решим вашу проблему</h4>
                        <div >
                            <form action="{{route('addFeedback')}}" class="contact_form" method="POST" style='margin:0 auto;max-width:700px'>
                                <div class="form-group">
                                    <label for="name" class="col-md-4 control-label">Имя</label>
                                    <div class="col-md-6">
                                        <input id="name" type="text" class="form-control" placeholder="Введите ваше имя" name="name" value="{{ old('name') }}"  autofocus>
                                        <span style="color:red">{{ $errors->first('name') }}</span>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="email" class="col-md-4 control-label">Почта</label>
                                    <div class="col-md-6">
                                        <input id="email" type="email" class="form-control" placeholder="Введите вашу почту" name="email" value="{{ old('email') }}"  autofocus>
                                        <span style="color:red">{{ $errors->first('email') }}</span>
                                    </div>
                                </div>    
                                <div class="form-group">
                                    <label for="message" class="col-md-4 control-label">Описание проблемы</label>
                                    <div class="col-md-6">
                                        <textarea class="form-control" id="message" rows='23' name="message" placeholder="Опишите вашу проблему" autofocus>{{ old('message') }}</textarea>
                                        <span style="color:red">{{ $errors->first('message') }}</span>
                                    </div>
                                </div>
                                <input type="submit" value="Отправьте вашу заявку">
                                {{ csrf_field() }}
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div id="primary" class="content-area grid__col grid__col--1-of-3">
                @include('widget')
            </div>
        </div>
    </div>
</div>
@endsection