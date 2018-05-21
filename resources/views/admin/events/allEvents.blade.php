@extends('layouts.app')
@section('content')
<head>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
    <style>
        .option {
            display: none;
        }
        .showForm {
            cursor: pointer;
        }
    </style>
</head>
<p class="btn btn-primary mb1 bg-green">Всего событий: {{$eventsCount}} </p>
<a href="{{ route('event.create')}}" class="more-link button">Добавить событие</a>
<div>
    <table class="adminTable">
        <th>Руководитель</th>
        <th>Название события</th>
        <th>Дата проведения</th>
        <th>Время проведения</th>
        <th>Адрес</th>
        <th>Краткое описание</th>
        <th>Полное описание</th>
        <th>Картинка</th>
        @foreach($events as $event)
        <tr class="showForm" id="{{$event->id}}">
            <td class="authod_id">{{$event->user->name}}</td>
            <td class="title"><div style="max-height:120px;width:50px;overflow-x:hidden">{{$event->title}}</div></td>
            <td class="event_date">{{$event->event_date}}</td>
            <td class="event_hours">{{$event->event_hours}}</td>
            <td class="address">{{$event->address}}</td>
            <td class="description"><div style="max-height:120px;width:100px;overflow-x:hidden">{{$event->description}}</div></td>
            <td class="content"><div style="max-height:120px;width:100px;overflow-x:hidden">{{$event->content}}</div></td>
            <td class="photo">
                <div style="width:100px;height:120px">
                    @empty(!$event->photo)
                    <img class="mw-100" style="width:100%;height:100%" src="{{asset('images/events/'.$event->photo)}}">
                    @else
                    Загрузите изображение
                    @endempty
                </div>
            </td>
            <td><a href="{{route('event.show',['id'=>$event->id])}}" class="more-link button">Просмотр события</a></td>
            <td><a href="{{route('event.edit',['id'=>$event->id]) }}" class="more-link button">Редактировать событие</a></td>
            <td><a href="{{route('event.delete',$event->id)}}" onclick="return confirm('Удалить событие?')" class="more-link button">Удалить событие</a></td>
        </tr>
        @endforeach
    </table>
    {{$events->links()}}
</div>
</div>@endsection  
</body>
</html>