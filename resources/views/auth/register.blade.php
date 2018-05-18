@extends('layouts.app')
@section('content')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2" style="margin-left: 200px;">
            <div class="panel panel-default">
                <div class="panel-heading">Регистрация</div>
                <div class="panel-body">
                    <form class="form-horizontal" method="POST" action="{{ route('register') }}" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <label for="name" class="col-md-4 control-label">Имя</label>
                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}"  autofocus>
                                <span style="color:red">{{ $errors->first('name') }}</span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="surname" class="col-md-4 control-label">Фамилия</label>
                            <div class="col-md-6">
                                <input id="surname" type="text" class="form-control" name="surname" value="{{ old('surname') }}"  autofocus>
                                <span style="color:red">{{ $errors->first('surname') }}</span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="middle_name" class="col-md-4 control-label">Отчество</label>
                            <div class="col-md-6">
                                <input id="middle_name" type="text" class="form-control" name="middle_name" value="{{ old('middle_name') }}"  autofocus>
                                <span style="color:red">{{ $errors->first('middle_name') }}</span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="phone" class="col-md-4 control-label">Телефон</label>
                            <div class="col-md-6">
                                <input id="phone" type="text" class="form-control" name="phone" value="{{ old('phone') }}"  autofocus>
                                <span style="color:red">{{ $errors->first('phone') }}</span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="email" class="col-md-4 control-label">E-Mail адрес</label>
                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}"  autofocus>
                                <span style="color:red">{{ $errors->first('email') }}</span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="avatar" class="col-md-4 control-label">Фотография</label>
                            <div class="col-md-6">
                                <input id="avatar" type="file" class="form-control" name="avatar" value="{{ old('avatar') }}"  autofocus>
                                <span style="color:red">{{ $errors->first('avatar') }}</span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="studentsClasses" class="col-md-4 control-label">Учебный класс</label>
                            <div class="col-md-6">
                                <select name="studentsClasses[]" id="classesSelect" multiple></select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="password" class="col-md-4 control-label">Пароль</label>
                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control" name="password" autofocus>
                                <span style="color:red">{{ $errors->first('password') }}</span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="password-confirm" class="col-md-4 control-label">Подтвердите пароль</label>
                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" autofocus>
                                <span style="color:red">{{ $errors->first('password-confirm') }}</span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="captcha" class="col-md-4 control-label">Введите капчу</label>
                            <div class="col-md-6">
                                @captcha
                                <input type="text" id="captcha" name="captcha" autofocus>
                                <span style="color:red">{{ $errors->first('captcha') }}</span>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Зарегистрироваться
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
$(document).ready(function () {
    $.ajax({
        type: 'get',
        url: '{{ route('getStudentClasses') }}',
        data: '',
        success: function (data) {
            console.log(data);
            for (var key in data.studentsClasses) {
                var id = data.studentsClasses[key].id;
                var letter = data.studentsClasses[key].letter_class;
                if (data.thisYear - data.studentsClasses[key].start_year + data.transition < 4) {
                    var studentClass = data.thisYear - data.studentsClasses[key].start_year + data.transition;
                    $('#classesSelect').append("<option value='" + id + "'>" + studentClass + " - " + letter + "</option>");
                } else if (data.thisYear <= data.studentsClasses[key].year_of_issue) {
                    var studentClass = data.thisYear - data.studentsClasses[key].start_year + data.transition + 1 - data.studentsClasses[key].fourth_class;
                    $('#classesSelect').append("<option value='" + id + "'>" + studentClass + " - " + letter + "</option>");
                } else {
                }
            }
        }
    });
});
</script>
@endsection
