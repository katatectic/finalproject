@extends('layouts.app')
@section('title')
    Регистрация на сайте
@endsection
@section('content')
<head>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
</head>
<div id="cinemahead">
    <div id="mobile-nav-container"></div>
</div>
<div class="container login">
    <div class="card card-container register">
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
