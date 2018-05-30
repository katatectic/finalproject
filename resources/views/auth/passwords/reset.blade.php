@extends('layouts.app')
@section('title')
	Смена пароля
@endsection
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Сменить пароль</div>
                <div class="panel-body">
                    <form class="form-horizontal" method="POST" action="{{ route('password.request') }}">
                        {{ csrf_field() }}
                        <input type="hidden" name="token" value="{{ $token }}">
						<div class="form-group">
							<label>E-Mail адрес</label>
							<input type="email" class="form-control" placeholder="E-Mail адрес" name="email" value="{{ $email or old('email') }}">
							<span style="color:red">{{ $errors->first('email') }}</span>
						</div>
						<div class="form-group">
							<label>Пароль</label>
							<input type="password" class="form-control" name="password">
							<span style="color:red">{{ $errors->first('password') }}</span>
						</div>
						<div class="form-group">
							<label>Повторите пароль</label>
							<input type="password" class="form-control" name="password_confirmation">
							<span style="color:red">{{ $errors->first('password_confirmation') }}</span>
						</div>
                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">Сменить пароль</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
