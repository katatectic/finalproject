@extends('layouts.app')
@section('content')
<div class="content" style="width:500px">
    <p class="btn btn-primary mb1 bg-green">Всего пользователей: {{$usersCount}} </p>
    <table class="table table-responsive" style="width:500px" >
        <thead class="thead-dark">
        <th>Имя</th>
        <th>Фамилия</th>
        <th>Отчество</th>
        <th>Почта</th>
        <th>Телефон</th>
        <th>Роль пользователя</th>
        <th>Дата регистрации</th>
        <th>Аватарка пользователя</th>
        </thead>
        <tbody >
            @foreach($users as $user)
            <tr>
                <td><div style="width:60px">{{$user->name}}</div></td>
                <td><div style="width:60px">{{$user->surname}}</div></td>
                <td><div style="width:60px">{{$user->middle_name}}</div></td>
                <td><div style="width:60px">{{$user->email}}</div></td>
                <td><div style="width:60px">{{$user->phone}}</div></td>
                <td><div style="width:60px">{{$user->role}}</div></td>
                <td>{{$user->created_at}}</td>
                <td class="avatar">
                    <div style="width:100px;height:120px">
                        @empty(!$user->avatar)
                        <img class="mw-100" style="width:100%;height:100%" src="{{asset('images/users/'.$user->avatar)}}">
                        @else
                        Нет аватарки
                        @endempty
                    </div>
                </td>
                <td><a href="{{ route('profile',['id'=>$user->id]) }}" class="more-link button">Просмотр</a></td>
                <td><a href="{{route('profile.edit',['id'=>$user->id]) }}" class="more-link button">Изменить данные</a></td>
                <td><a href="{{route('profile.destroy',$user->id)}}" onclick="return confirm('Удалить профиль?')" class="more-link button">Удалить пользователя</a></td>
            </tr>
            @endforeach
        </tbody>
    </table>
	{{$users->links()}}
</div>@endsection  
</body>
</html>