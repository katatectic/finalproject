@extends('layouts.app')
@section('title')
    Регистрация на сайте
@endsection
@section('content')
<head>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
    <style>
        body, html {
            height: 100%;
            background-repeat: no-repeat;
            background-image: linear-gradient(#ff6600 , #f17432,#ff6347 );
        }

        .card-container.card {
            max-width: 750px;
            padding: 40px 40px;
        }

        .btn {
            font-weight: 700;
            height: 36px;
            -moz-user-select: none;
            -webkit-user-select: none;
            user-select: none;
            cursor: default;
        }

        /*
         * Card component
         */
        .card {
            background-color: #F7F7F7;
            /* just in case there no content*/
            padding: 20px 25px 30px;
            margin: 0 auto 25px;
            margin-top: 50px;
            /* shadows and rounded borders */
            -moz-border-radius: 2px;
            -webkit-border-radius: 2px;
            border-radius: 2px;
            -moz-box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.3);
            -webkit-box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.3);
            box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.3);
        }

        .profile-img-card {
            width: 96px;
            height: 96px;
            margin: 0 auto 10px;
            display: block;
            -moz-border-radius: 50%;
            -webkit-border-radius: 50%;
            border-radius: 50%;
        }

        /*
         * Form styles
         */
        .profile-name-card {
            font-size: 16px;
            font-weight: bold;
            text-align: center;
            margin: 10px 0 0;
            min-height: 1em;
        }

        .reauth-email {
            display: block;
            color: #404040;
            line-height: 2;
            margin-bottom: 10px;
            font-size: 14px;
            text-align: center;
            overflow: hidden;
            text-overflow: ellipsis;
            white-space: nowrap;
            -moz-box-sizing: border-box;
            -webkit-box-sizing: border-box;
            box-sizing: border-box;
        }

        .form-signin #inputEmail,
        .form-signin #inputPassword {
            direction: ltr;
            height: 44px;
            font-size: 16px;
        }

        .form-signin input[type=email],
        .form-signin input[type=password],
        .form-signin input[type=text],
        .form-signin button {
            width: 100%;
            display: block;
            margin-bottom: 10px;
            z-index: 1;
            position: relative;
            -moz-box-sizing: border-box;
            -webkit-box-sizing: border-box;
            box-sizing: border-box;
        }

        .form-signin .form-control:focus {
            border-color: rgb(104, 145, 162);
            outline: 0;
            -webkit-box-shadow: inset 0 1px 1px rgba(0,0,0,.075),0 0 8px rgb(104, 145, 162);
            box-shadow: inset 0 1px 1px rgba(0,0,0,.075),0 0 8px rgb(104, 145, 162);
        }

        .btn.btn-signin {

            background-color: #ff6347 ;
            max-width:250px;
            padding: 0px;
            margin: 0 auto;
            font-weight: 700;
            font-size: 14px;
            height: 36px;
            -moz-border-radius: 3px;
            -webkit-border-radius: 3px;
            border-radius: 3px;
            border: none;
            -o-transition: all 0.218s;
            -moz-transition: all 0.218s;
            -webkit-transition: all 0.218s;
            transition: all 0.218s;
        }

        .btn.btn-signin:hover,
        .btn.btn-signin:active,
        .btn.btn-signin:focus {
            background-color: #ff6347;
        }

        .forgot-password {
            color: rgb(104, 145, 162);
        }

        .forgot-password:hover,
        .forgot-password:active,
        .forgot-password:focus{
            color: #ff6347;
        }

    </style>
</head>
<div class="container">
    <div class="card card-container">
        <img id="profile-img" class="profile-img-card" src="//ssl.gstatic.com/accounts/ui/avatar_2x.png" />
        <div class="form-group">
            <label style="text-align:center">Регистрация на сайте</label>
        </div>
        <p id="profile-name" class="profile-name-card"></p>
        <form class="form-signin" method="POST" action="{{ route('register') }}" enctype="multipart/form-data">
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
                <label for="sex" class="col-md-4 col-lg-12 control-label">Пол</label>
                <div class="col-md-6">
                    <select name="sex" id="sex" class="form-control" value="{{ old('sex') }}">
                        <option value="" disabled="disabled" selected="selected">Выберите пол</option>
                        <option value="Мужской">Мужской</option>
                        <option value="Женский">Женский</option>
                    </select><br/>
                    <span style="color:red">{{ $errors->first('sex') }}</span>
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-4 control-label">Дата рождения</label>
                <div>
                    <select name="day" style='max-width:210px'>
                        <option value="" disabled="disabled" selected="selected">Выберите день</option>
                        @foreach (range(1,31) as $day)
                            <option value="{{$day}}">{{$day}}</option>
                        @endforeach
                    </select>
                    <span style="color:red">{{ $errors->first('day') }}</span>
                    <select name="month" style='max-width:210px'>
                        <option value="" disabled="disabled" selected="selected">Выберите месяц</option>
                        @foreach (range(1,12) as $month)
                            <option value="{{$month}}">{{$monthNames[$month]}}</option>
                        @endforeach
                    </select>
                    <span style="color:red">{{ $errors->first('month') }}</span>
                    <select name="year" style='max-width:210px'>
                        <option value="" disabled="disabled" selected="selected">Выберите год</option>
                        @foreach (range($thisYear,1920) as $year)
                            <option value="{{$year}}">{{$year}}</option>
                        @endforeach
                    </select>
                    <span style="color:red">{{ $errors->first('year') }}</span>
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
            <button class="btn btn-lg btn-primary btn-block btn-signin" type="submit">Зарегестрироваться</button>
        </form>
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
