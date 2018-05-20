@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2" style="margin-left: 200px;">
            <div class="panel panel-default">
                <div class="form">
                    <form method="POST" action="{{route('profile.edit', ['id' => $all->id ] ) }}" enctype="multipart/form-data">
                        <div class="form-group">
                            <label for="name">Имя пользователя</label>
                            <input type="text" class="form-control" id="name" name="name" value="{{$all->name}}"> <span style="color:red">{{ $errors->first('name') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="surname">Фамилия пользователя</label>
                            <input type="text" class="form-control" id="surname" name="surname" value="{{$all->surname}}"> <span style="color:red">{{ $errors->first('surname') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="middle_name">Отчество пользователя</label>
                            <input type="text" class="form-control" id="middle_name" name="middle_name" value="{{$all->middle_name}}"> <span style="color:red">{{ $errors->first('middle_name') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="email">Почта пользователя</label>
                            <input type="email" class="form-control" id="email" name="email" value="{{$all->email}}"> <span style="color:red">{{ $errors->first('email') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="phone">Телефон пользователя</label>
                            <input type="text" class="form-control" id="phone" name="phone" value="{{$all->phone}}"> <span style="color:red">{{ $errors->first('phone') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="role">Роль пользователя</label>
                            <input type="text" class="form-control" id="role" name="role" value="{{$all->role}}">
                            {{--<span style="color:red">{{ $errors->first('phone') }}</span>--}}
                        </div>


                        {{--
                        <input type="hidden" name="avatar" value="{{$all->avatar}}">
                        <input type="hidden" name="password" value="{{$all->password}}">
                        <input type="hidden" name="password_confirmation" value="{{$all->password_confirmation}}">
                        --}}
                        

                        
                        <div class="form-group">
                            <label for="avatar" class="col-md-4 control-label">Фотография</label>
                            <div class="col-md-6">
                                <input id="avatar" type="file" class="form-control" name="avatar" value="{{$all->avatar}}"  autofocus>
                                <span style="color:red">{{ $errors->first('avatar') }}</span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="password">Пароль</label>
                            <input type="password" name="password" id="password" />
                        </div>
                        <div class="form-group">
                            <label for="password">Повторите пароль</label>
                            <input type="password" name="password_confirmation" id="password_confirmation" />
                        </div>
                        

                        <button type="submit" class="btn btn-primary">Отправить</button>
                        {{ csrf_field() }}
                    </form>
                </div>
            </div>
        </div>
    </div>
</div> <!-- /container -->
@endsection