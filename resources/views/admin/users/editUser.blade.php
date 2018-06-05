@extends('layouts.admin')
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
<div class="content-wrapper">
    <section class="content-header">
        <h1>
            Изменить данные пользователя {{$all->name}} {{$all->surname}}
        </h1>
    </section>
    <section class="content">
        <form method="post" action="{{route('profile.update', ['id' => $all->id ] ) }}"
              enctype="multipart/form-data">
            <div class="box">
                <div class="box-body">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="name">Имя пользователя</label>
                            <input type="text" class="form-control" id="name" name="name" value="{{$all->name}}">
                            <span style="color:red">{{ $errors->first('name') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="surname">Фамилия пользователя</label>
                            <input type="text" class="form-control" id="surname" name="surname"
                                   value="{{$all->surname}}"> <span
                                   style="color:red">{{ $errors->first('surname') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="middle_name">Отчество пользователя</label>
                            <input type="text" class="form-control" id="middle_name" name="middle_name"
                                   value="{{$all->middle_name}}"> <span
                                   style="color:red">{{ $errors->first('middle_name') }}</span>
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
                            <input type="email" class="form-control" id="email" name="email"
                                   value="{{$all->email}}"> <span
                                   style="color:red">{{ $errors->first('email') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="phone">Телефон пользователя</label>
                            <input type="text" class="form-control" id="phone" name="phone" value="{{$all->phone}}">
                            <span style="color:red">{{ $errors->first('phone') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="role">Роль пользователя</label>
                            {{--<input type="text" class="form-control" id="role" name="role" value="{{$all->role}}">--}}
                                       <select name="role">
                                    @foreach($roleNames as $key => $roleName)
                                    <option value="{{$key}}"
                                            @if($key == $all->role) selected @endif>{{$roleName}}</option>
                                    @endforeach
                                </select>
                            {{--<span style="color:red">{{ $errors->first('phone') }}</span>--}}
                            </div>
                            <div class="form-group">
                                <p class="accordion">Подкомитеты (Классы)</p>
                            <div class="clasesSelect">
                                <select name="studentsClasses[]" multiple style="height:200px">
                                    @foreach($studentsClasses as $class)
                                    <option value="{{$class->id}}"
                                            @if($all->studentsClasses->contains('pivot.student_class_id', $class->id)) selected @endif>
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
                    <div class="form-group">
                        <label for="avatar" class="col-md-4 control-label">Фотография</label>
                        <div class="col-md-6">
                            <input id="avatar" type="file" class="form-control" name="avatar"
                                   value="{{$all->avatar}}" autofocus>
                            <span style="color:red">{{ $errors->first('avatar') }}</span>
                        </div>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="box-footer">
                        <button class="btn btn-success pull-left bg-orange"
                                onclick="window.history.go(-1); return false;">Назад
                        </button>
                        <button class="btn btn-success pull-right bg-orange">Сохранить</button>
                    </div>
                </div>
                {{ csrf_field() }}
            </div>
        </div>
    </form>
</section>
</div>
<script>
    var acc = document.getElementsByClassName("accordion");
    var i;
    for (i = 0; i < acc.length; i++) {
        acc[i].addEventListener("click", function () {
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