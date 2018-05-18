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
<p class="btn btn-primary mb1 bg-green">Всего новостей: {{$newsCount}} </p>
<a href="{{ route('newsview')}}" class="btn btn-primary">Добавить новость</a>
<div>
    <table class="adminTable">
        <th>Заголовок</th>
        <th>Дата новости</th>
        <th>Текст новости</th>
        <th>Картинка</th>
        @foreach($all as $news)
        <tr class="showForm" id="{{$news->id}}">
            <td class="title"><div style="max-height:120px;width:50px;overflow-x:hidden">{{$news->title}}</div></td>
            <td class="date">{{$news->date}}</td>  
            <td class="content"><div style="max-height:120px;width:100px;overflow-x:hidden">{{$news->content}}</div></td>
            <td class="photo">
                <div style="width:100px;height:120px">
                    @empty(!$news->photo)
                    <img class="mw-100" style="width:100%;height:100%" src="{{asset('images/news/'.$news->photo)}}">
                    @else
                    Загрузите изображение
                    @endempty
                </div>
            </td>
            <td><a href="{{route('onenews',['id'=>$news->id])}}" class="more-link button">Просмотр новости</a></td>
            <td><a href="{{route('editnews',['id'=>$news->id]) }}" class="more-link button">Редактировать новость</a></td>
            <td><a href="{{route('deletenews',$news->id)}}" onclick="return confirm('Удалить новость?')" class="more-link button">Удалить новость</a></td>
        </tr>
        @endforeach
    </table>
    {{$all->links()}}
    <div class='option'  align="center">
        <form method="post" action="" id="updateClass" enctype="multipart/form-data">
            {{ csrf_field() }}
            <p><input type="hidden" class="id" value="" name="id"></p>
            <label>Заголовок<input type="text" name="title_edit" class="form-control"></label>
            <label>Дата новости<input type="date" name="news_date_edit" class="form-control"></label>           
            <label>Текст новости<textarea class="form-control" rows='23' name="content_edit"></textarea></label>
            <label>Изображение<input type="file" name="photo_edit" class="form-control" style="display: none;"></label>
            <input type="submit"  value="Пересохранить" class="btn btn-primary">
        </form>
        <p><input type="button" class="subm no btn btn-primary" value="Отмена"></p>
    </div>
</div>
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
            $('input[name="news_date_edit"]').val($(this).children('td.date').text());
            $('textarea[name="content_edit"]').val($(this).children('td.content').text());
            $('input[name="photo_edit"]').val($(this).children('td.photo').text());
        });
    });
</script>
</div>@endsection  
</body>
</html>