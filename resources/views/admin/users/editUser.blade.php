@extends('layouts.app')
@section('title')
	Редактировать пользователя {{$all->name}} {{$all->surname}}
@endsection
@section('content')
    <head>
        <style>
            .accordion {
                background-color: #eee;
                color: #444;
                cursor: pointer;
                padding: 18px;
                width: 100%;
                border: none;
                text-align: left;
                outline: none;
                font-size: 15px;
                transition: 0.4s;
                margin: 20px 0;
                max-width: 400px;
            }
            .studentClasses {
                margin: 20px 0;
                max-width: 400px;
            }
            .active, .accordion:hover {
                background-color: #ccc;
            }

            .clasesSelect {
                padding: 0 18px;
                display: none;
                background-color: white;
                overflow: hidden;
            }
        </style>
    </head>
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2" style="margin-left: 200px;">
            <div class="panel panel-default">
                <div class="form">
                    <form method="post" action="{{route('profile.update', ['id' => $all->id ] ) }}" enctype="multipart/form-data">
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
                            <label for="sex" class="col-md-4 col-lg-12 control-label">Пол</label>
                            <div class="col-md-6">
                                <select name="sex" id="sex" class="form-control" value="{{$all->sex}}">
                                    <option value="" disabled="disabled" selected="selected">Выберите пол</option>
                                    <option value="Мужской">Мужской</option>
                                    <option value="Женский">Женский</option>
                                </select><br/>
                                <span style="color:red">{{ $errors->first('sex') }}</span>
                            </div>
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
                            {{--<input type="text" class="form-control" id="role" name="role" value="{{$all->role}}">--}}
                            <select name="role">
                                @foreach($roleNames as $key => $roleName)
                                    <option value="{{$key}}" @if($key == $all->role) selected @endif>{{$roleName}}</option>
                                @endforeach
                            </select>
                            {{--<span style="color:red">{{ $errors->first('phone') }}</span>--}}
                        </div>
                        <div class="form-group">
                            <p class="accordion">Подкомитеты (Классы)</p>
                            <div class="clasesSelect">
                                <select name="studentsClasses[]" multiple style="height:200px">
                                    @foreach($studentsClasses as $class)
                                        <option value="{{$class->id}}" @if($all->studentsClasses->contains('pivot.student_class_id', $class->id)) selected @endif>
                                            @if (date('Y') - $class->start_year + $transition < 4)
                                                {{date('Y') - $class->start_year + $transition}}
                                            @elseif (date('Y') <= $class->year_of_issue)
                                                {{date('Y') - $class->start_year + $transition + 1 - $class->fourth_class}}
                                            @else
                                            (Выпустился) {{$class->year_of_issue - $class->start_year - $class->fourth_class}}
                                            @endif
                                            <span>{{$class->letter_class}}</span>
                                        </option>
                                    @endforeach
                                </select>
                            </div>
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
                        <input type="submit" class="btn btn-primary" value="Сохранить изменения">
                        {{ csrf_field() }}
                    </form>
                </div>
            </div>
        </div>
    </div>
</div> <!-- /container -->
    <script>
        var acc = document.getElementsByClassName("accordion");
        var i;
        for (i = 0; i < acc.length; i++) {
            acc[i].addEventListener("click", function() {
                this.classList.toggle("active");
                var panel = this.nextElementSibling;
                if (panel.style.display === "block") {
                    panel.style.display = "none";
                } else {
                    panel.style.display = "block";
                }
            });
        }
    </script>
@endsection