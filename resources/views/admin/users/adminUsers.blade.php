@extends('layouts.app')
@section('content')
<div class="content">
    <p class="btn btn-primary mb1 bg-green">Всего пользователей: {{$usersCount}} </p>
    <table class="table table-responsive" >
        <thead class="thead-dark">
        <th>Имя</th>
        <th>Фамилия</th>
        <th>Отчество</th>
        <th>Почта</th>
        <th>Телефон</th>
        <th>Дата регистрации</th>
        <th>Аватарка пользователя</th>
        </thead>
        <tbody >
            @foreach($users as $user)
            <tr>
                <td>{{$user->name}}</td>
                <td>{{$user->surname}}</td>
                <td>{{$user->middle_name}}</td>
                <td>{{$user->email}}</td>
                <td>{{$user->phone}}</td>
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
                <td><a href="{{route('edituser',['id'=>$user->id]) }}" class="more-link button">Изменить данные</a></td>
                <td><a href="{{route('deleteuser',$user->id)}}" onclick="return confirmDelete();" class="more-link button">Удалить пользователя</a></td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <script>
        function confirmDelete() {
            if (confirm("Вы подтверждаете удаление?")) {
                return true;
            } else {
                return false;
            }
        }
    </script>
</div>@endsection  
</body>
</html>