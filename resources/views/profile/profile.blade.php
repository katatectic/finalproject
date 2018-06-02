@extends('layouts.app')
@section('title')
Профиль пользователя {{$user->name}} {{$user->surname}}
@endsection
@section('content')
<div class="content">
    <div class="bread">
        <a href="{{route('main')}}">Главная</a> / Профиль пользователя {{$user->name}} {{$user->surname}}
    </div>
    <section id="contentSection">
        <div class="row">
            @if($user or $eventCount or $newsCount)
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <header class="panel-title">
                            <div class="text-center">
                                <p>{{$roleNames[$user->role]}}</p>
                            </div>
                        </header>
                    </div>
                    <div class="panel-body" style="margin:0 auto;width:500px">
                        <div style="width:100px;height:120px">
                            @empty(!$user->avatar)
                            <img class="mw-100" style="width:100%;height:100%" src="{{asset('images/users/'.$user->avatar)}}">
                            @else
                            Нет аватарки
                            @endempty
                        </div>
                        <div class="text-center" id="author">
                            <table class="table table-th-block">
                                <tbody>
                                    <tr>
                                        <td class="active">Статус:</td>
                                        @if ($user->isOnline())
                                            <td class="fa fa-circle text-success"> Онлайн</td></tr>
                                        @else
                                            <td class="fa fa-circle text-danger"> Офлайн</td></tr>
                                        @endif
                                    <tr>
                                    <tr><td class="active">Имя:</td><td>{{$user->name}}</td></tr>
                                    <tr><td class="active">Фамилия:</td><td>{{$user->surname}}</td></tr>
                                    <tr><td class="active">Отчество:</td><td>{{$user->middle_name}}</td></tr>
                                    <tr><td class="active">Пол:</td><td>{{$user->sex}}</td></tr>
                                    <tr><td class="active">Почта:</td><td>{{$user->email}}</td></tr>
                                    <tr><td class="active">Телефон:</td><td>{{$user->phone}}</td></tr>
                                    <td class="active">Комитеты:</td>
                                    <td>
                                        @foreach( $user->studentsClasses as $class)
                                        @if(!$loop->first),  @endif
                                        @if (date('Y') - $class->start_year + $transition < 4)
                                        {{date('Y') - $class->start_year + $transition}}
                                        @elseif (date('Y') <= $class->year_of_issue)
                                        {{date('Y') - $class->start_year + $transition + 1 - $class->fourth_class}}
                                        @else
                                        (Выпустился) {{$class->year_of_issue - $class->start_year - $class->fourth_class}}
                                        @endif
                                        <span>{{$class->letter_class}}</span>
                                        @endforeach
                                    </td>
                                </tr>
                                <tr><td class="active">Дата регистрации</td><td>{{$user->created_at->format('d-m-Y')}}</td></tr>
                                <tr><td class="active">Всего объявлений</td>
                                    @if ($eventCount > 0 )
                                    <td><a href="{{ route('profile.events',['id'=>$user->id]) }}">{{$eventCount}}</td></a></tr>
                                @else
                                <td><a href="{{ route('profile.events',['id'=>$user->id]) }}">0</a></td>
                                @endif
                                <tr><td class="active">Всего новостей</td>
                                    @if ($newsCount > 0 )
                                    <td><a href="{{ route('profile.news',['id'=>$user->id]) }}">{{$newsCount}}</a></td></tr>
                                @else
                                <td><a href="{{ route('profile.news',['id'=>$user->id]) }}">0</a></td>
                                @endif
                                <tr><td class="active">Всего отчётов</td>
                                    @if ($reportsCount > 0 )
                                    <td><a href="{{ route('profile.reports',['id'=>$user->id]) }}">{{$reportsCount}}</a></td></tr>
                                @else
                                <td><a href="{{ route('profile.reports',['id'=>$user->id]) }}">0</a></td>
                                @endif
                                </tbody>
                            </table>
                            @if (!Auth::guest())
                            @if (Auth::user()->role == 1 or Auth::user()->role == 2)
                            <a href="{{route('profile.edit',['id'=>$user->id]) }}" class="more-link button">Изменить данные</a>
                            <a href="{{route('profile.destroy',$user->id)}}" onclick="return confirm('Удалить профиль?')" class="more-link button">Удалить профиль</a>
                            @endif
                            @endif
                        </div>
                    </div>
                </div>
            </div>            
            @endif
        </div>
    </section>
</div>
@endsection