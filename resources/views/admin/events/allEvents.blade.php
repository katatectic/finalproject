@extends('layouts.app')
@section('content')
<div class="container">
    <p class="btn btn-primary mb1 bg-green">Всего событий: {{$eventsCount}} </p>
    <a href="{{ route('eventview')}}" class="btn btn-primary">Добавить событие</a>
    <table class="table table-responsive">
        <thead class="thead-dark">
        <th>Руководитель</th>
        <th>Название события</th>
        <th>Дата проведения</th>
        <th>Время проведения</th>
        <th>Адрес</th>
		<th>Краткое описание</th>
		<th>Полное описание</th>
        <th>Картинка</th>
        </thead>
        <tbody >
            @foreach($all as $event)
            <tr>
                <td>Руководитель</td>
                <td><div style="max-height:120px;width:50px;overflow-x:hidden">{{$event->title}}</div></td>
                <td>{{$event->event_date}}</td>
				<td>{{$event->event_hours}}</td>
				<td>{{$event->address}}</td>
                <td><div style="max-height:120px;width:100px;overflow-x:hidden">{{$event->description}}</div></td>
                <td><div style="max-height:120px;width:100px;overflow-x:hidden">{{$event->content}}</div></td>
                <td>
                    <div style="width:100px;height:120px">
                        @empty(!$event->photo)
                        <img class="mw-100" style="width:100%;height:100%" src="{{asset('images/'.$event->photo)}}">
                        @else
                        Загрузите изображение
                        @endempty
                    </div>
                </td>
                <td><a href="" class="btn btn-primary">Просмотр события</a></td>
                <td><a href="" class="btn btn-primary">Редактировать событие</a></td>
                <td><a href="" onclick="return confirmDelete();" class="btn btn-primary">Удалить событие</a></td>

            </tr>
            @endforeach
        </tbody>
    </table>
	{{$all->links()}}
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