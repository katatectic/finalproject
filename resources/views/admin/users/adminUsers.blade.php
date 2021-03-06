@extends('layouts.admin')
@section('title')
    Список пользователей
@endsection
@section('content')
<div class="content-wrapper">
    <section class="content-header">
        <h1>Пользователи</h1>
    </section>
    <section class="content">
        <div class="box">
            <div class="box-header">
                <h3 class="btn btn-primary mb1 bg-orange">Всего пользователей: {{$usersCount}}</h3>
            </div>
            @if(session('status'))
                <div class="alert alert-success alert-dismissible" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    {{session('status')}}
                </div>
            @endif
            <div class="box-body">
                <table id="example1" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>Имя</th>
                            <th>Фамилия</th>
                            <th>Отчество</th>
                            <th>Возраст</th>
                            <th>Почта</th>
                            <th>Телефон</th>
                            <th>Роль пользователя</th>
                            <th>Дата регистрации</th>
                            <th>Аватарка пользователя</th>
                            <th>Классы</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($users as $user)
                        <tr>
                            <td title="{{$user->name}}">{{str_limit($user->name, 8, '...')}}</td>
                            <td title="{{$user->surname}}">{{str_limit($user->surname, 10, '...')}}</td>
                            <td title="{{$user->middle_name}}">{{str_limit($user->middle_name, 10, '...')}}</td>
                            <td title="{{$user->middle_name}}">
                                @if (empty($user->age()))
                                    Возраст скрыт
                                @else
                                    {{ $user->age()}} {{ $endingOfAge($user->age()) }}
                                @endif</td>
                            <td title="{{$user->email}}">{{str_limit($user->email, 10, '...')}}</td>
                            <td>{{$user->phone}}</td>
                            <td title="{{$roleNames[$user->role]}}">{{str_limit($roleNames[$user->role], 10, '...')}}</td>
                            <td>{{date('j '.$monthNames[date('n', strtotime($user->created_at))].' Y года'.' в H:i', strtotime($user->created_at))}}</td>
                            <td>
                                <div class="image-lightbox">
                                    <a href="{{asset('images/users/'.$user->avatar)}}" data-lightbox="{{asset('images/users/'.$user->avatar)}}" >
                                        <img width="70" src="{{asset('images/users/'.$user->avatar)}}" class="attachment-full size-full wp-post-image"/>
                                    </a>
                                </div>
                            </td>
                            <td>
                                @foreach( $user->studentsClasses as $class)
                                    @if(!$loop->first),  @endif
                                    {{$classesNumbers()[$class->id]}}
                                <span>{{$class->letter_class}}</span>
                                @endforeach
                            </td>
                            <td>
                                <a href="{{ route('profile',['id' => $user->id]) }}" class="fa fa-eye"></a>
                                <a href="{{route('profile.edit',['id' => $user->id]) }}" class="fa fa-pencil"></a>
                                <a href="{{route('profile.destroy', $user->id)}}" onclick="return confirm('Удалить пользователя?')" class="fa fa-remove"></a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            {{$users->links()}}
        </div>
    </section>
</div>
@endsection  
