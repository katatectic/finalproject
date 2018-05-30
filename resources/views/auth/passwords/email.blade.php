@extends('layouts.app')
@section('title')
	Сброс пароля
@endsection
@section('content')
<div class="container" style="margin-left:50px">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Сбросить пароль</div><br/><br/>
                <div class="panel-body">
                    @if (session('status'))
                    <div class="alert alert-success">
                        {{ session('status') }}
                    </div>
                    @endif
                    <form class="form-horizontal" method="POST" action="{{ route('password.email') }}">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <label>E-Mail адрес</label>
                            <input type="email" class="form-control" placeholder="E-Mail адрес" name="email" value="{{ old('email') }}">
                            <span style="color:red">{{ $errors->first('email') }}</span>
                        </div>
                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">Выслать ссылку на восстановление пароля</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
