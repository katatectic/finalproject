@extends('layouts.app')
@section('title')
    Авторизация на сайте
@endsection
@section('content')
<div id="cinemahead">
    <div id="mobile-nav-container"></div>
</div>
<div class="container login">
    <div class="card card-container">
        <img id="profile-img" class="profile-img-card" src="//ssl.gstatic.com/accounts/ui/avatar_2x.png" />
        <div class="form-group">
            <label style="text-align:center">Авторизация</label>
        </div>
        <p id="profile-name" class="profile-name-card"></p>
        <form class="form-signin" method="POST" action="{{ route('login') }}">
            {{ csrf_field() }}
            <div class="form-group">
                <label>E-Mail адрес</label>
                <input type="email" class="form-control" placeholder="E-Mail адрес" name="email" value="{{ old('email') }}">
                <span style="color:red">{{ $errors->first('email') }}</span>
            </div>
            <div class="form-group">
                <label>Пароль</label>
                <input type="password" class="form-control" placeholder="Пароль" name="password">
                <span style="color:red">{{ $errors->first('password') }}</span>
            </div>
            <div id="remember" class="checkbox">
                <label>
                    <label>
                        <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> Запомнить меня
                    </label>
                </label>
            </div>
            <button class="btn btn-lg btn-primary btn-block btn-signin" type="submit">Вход</button>
        </form>
        <a href="{{ route('password.request') }}" class="forgot-password">
            Забыли пароль?
        </a>
    </div>
</div>
@endsection
