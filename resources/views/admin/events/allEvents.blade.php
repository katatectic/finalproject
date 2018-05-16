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
<a href="{{ route('eventview')}}" class="btn btn-primary">Добавить событие</a>
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
        @foreach($all as $event)
        <tr class="showForm" id="{{$event->id}}">
            <td class="authod_id">Руководитель</td>
            <td class="title"><div style="max-height:120px;width:50px;overflow-x:hidden">{{$event->title}}</div></td>
            <td class="event_date">{{$event->event_date}}</td>
            <td class="event_hours">{{$event->event_hours}}</td>
            <td class="address">{{$event->address}}</td>
            <td class="description"><div style="max-height:120px;width:100px;overflow-x:hidden">{{$event->description}}</div></td>
            <td class="content"><div style="max-height:120px;width:100px;overflow-x:hidden">{{$event->content}}</div></td>
            <td class="photo">
                <div style="width:100px;height:120px">
                    @empty(!$event->photo)
                    <img class="mw-100" style="width:100%;height:100%" src="{{asset('images/'.$event->photo)}}">
                    @else
                    Загрузите изображение
                    @endempty
                </div>
            </td>
            <td><a href="{{route('event',['id'=>$event->id])}}" class="more-link button">Просмотр события</a></td>
            <td><a href="{{route('editevent',['id'=>$event->id]) }}" class="more-link button">Редактировать событие</a></td>
            <td><a href="{{route('deleteevent',$event->id)}}" onclick="return confirmDelete();" class="more-link button">Удалить событие</a></td>
        </tr>
        @endforeach
    </table>
    {{$all->links()}}
    <div class='option'  align="center">
        <form method="post" action="" id="updateClass" enctype="multipart/form-data">
            {{ csrf_field() }}
            <p><input type="hidden" class="id" value="" name="id"></p>
            <label>Название события<input type="text" name="title_edit" class="form-control"></label>
            <label>Дата проведения события<input type="date" name="event_date_edit" class="form-control"></label>
            <label>Время проведения события<input type="text" name="event_hours_edit" class="form-control"></label>
            <label>Место проведения события<input type="text" name="address_edit" class="form-control"></label>
            <label>Краткое описание события<textarea class="form-control" rows='23' name="description_edit"></textarea></label>
            <label>Полное описание события<textarea class="form-control" rows='23' name="content_edit"></textarea></label>
            <label>Изображение<input type="file" name="photo_edit" class="form-control" style="display: none;"></label>
            <input type="submit"  value="Пересохранить" class="btn btn-primary">
        </form>
        <p><input type="button" class="subm no btn btn-primary" value="Отмена"></p>
    </div>
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
<script>
    $(document).ready(function () {
        $('.no').click(function () {
            $('.option').fadeOut('slow');
        });
        $('.showForm').click(function (e) {
            $('.option').fadeIn('slow');
            $('.option').css({
                'top': e.pageY,
                'left': e.pageX
            });
            $('input.id').val($(this).attr('id'));
            $('input[name="title_edit"]').val($(this).children('td.title').text());
            $('input[name="event_date_edit"]').val($(this).children('td.event_date').text());
            $('input[name="event_hours_edit"]').val($(this).children('td.event_hours').text());
            $('input[name="address_edit"]').val($(this).children('td.address').text());
            $('textarea[name="description_edit"]').val($(this).children('td.description').text());
            $('textarea[name="content_edit"]').val($(this).children('td.content').text());
            $('input[name="photo_edit"]').val($(this).children('td.photo').text());
        });
    });
</script>
</div>@endsection  
</body>
</html>