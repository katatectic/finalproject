@extends('layouts.app')
@section('content')
<div class="content">
    <section id="contentSection">
        <div class="row">
            @if($user)
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <header class="panel-title">
                            <div class="text-center">
                                <p>Пользователь сайта</p>
                            </div>
                        </header>
                    </div>
                    <div class="panel-body" style="margin:0 auto;width:500px">
					<div style="width:100px;height:120px">
                        @empty(!$user->image)
                        <img class="mw-100" style="width:100%;height:100%" src="{{asset('images/'.$user->image)}}">
                        @else
                        Нет аватарки
                        @endempty
                    </div>
                        <div class="text-center" id="author">
                            <table class="table table-th-block">
                                <tbody>
                                    <tr><td class="active">Имя:</td><td>{{$user->name}}</td></tr>
									<tr><td class="active">Фамилия:</td><td>{{$user->surname}}</td></tr>
                                    <tr><td class="active">Отчество:</td><td>{{$user->middle_name}}</td></tr>
									<tr><td class="active">Почта:</td><td>{{$user->email}}</td></tr>
									<tr><td class="active">Телефон:</td><td>{{$user->phone}}</td></tr>
                                    <tr><td class="active">Дата регистрации</td><td>{{$user->created_at}}</td></tr>
                                </tbody>
                            </table>
							<a href="{{route('edituser',['id'=>$user->id]) }}" class="more-link button">Изменить данные</a>
                            <a href="{{route('deleteuser',$user->id)}}" onclick="return confirmDelete();" class="more-link button">Удалить профиль</a>
                        </div>
                    </div>
                </div>
            </div>
            @endif
        </div>
		<script>
        function confirmDelete() {
            if (confirm("Вы подтверждаете удаление?")) {
                return true;
            } else {
                return false;
            }
        }
    </script>
    </section>
    @endsection    
</body>
</html>