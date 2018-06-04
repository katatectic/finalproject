@extends('layouts.admin')
@section('title')
	Настройки сайта
@endsection
@section('content')
<div class="content-wrapper">
    <section class="content-header">
        <h1>
            Редактировать настройки
        </h1>
    </section>
    <section class="content">
        <form method="POST" class="form-horizontal" enctype="multipart/form-data" action="{{ route('settings.update') }}" >
            <div class="box">
                <div class="box-body">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Заголовок сайта</label>
                            <input type="text" class="form-control" placeholder="Название события" name="title" value="{{$settings->title}}">
                            <span style="color:red">{{ $errors->first('title') }}</span>
                        </div>                        
						<div class="form-group">
                            <label for="exampleInputFile">Изображение</label>
                            @isset($settings->logo)
                                <img width="100" src="{{asset('images/logo/'.$settings->logo)}}" class="attachment-full size-full wp-post-image"/>
                            @endisset
                            <input type="file" name="logo" id="exampleInputFile">
                            <span style="color:red">{{ $errors->first('logo') }}</span>
                        </div>
                        <div class="form-group">
                            <label>Адрес организации</label>
                            <input type="text" class="form-control" placeholder="Название события" name="address" value="{{$settings->address}}">
                            <span style="color:red">{{ $errors->first('address') }}</span>
                        </div>

                        <div class="form-group">
                            <label for="phone" class="col-md-4 control-label">Телефон</label>
                            <input type="text" id="phone"  class="form-control" name="phone" value="{{$settings->phone}}"  autofocus>
                            <span style="color:red">{{ $errors->first('phone') }}</span>
                        </div>
                        <div class="box-footer">
                        <button class="btn btn-success bg-orange"onclick="window.history.go(-1); return false;">Назад</button>
                        <button class="btn btn-success bg-orange">Сохранить</button>
                        </div>
                    </div>
                    {{ csrf_field() }}
                </div>
            </div>
        </form>
    </section>
</div>
@endsection