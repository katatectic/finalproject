@extends('layouts.app')
@section('content')

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
            <td><a href="{{route('article', ['id'=>$news->id])}}" class="more-link button">Просмотр новости</a></td>
            <td><a href="{{route('editnews',['id'=>$news->id]) }}" class="more-link button">Редактировать новость</a></td>
            <td><a href="{{route('deletenews',$news->id)}}" onclick="return confirm('Удалить новость?')" class="more-link button">Удалить новость</a></td>
        </tr>
        @endforeach
    </table>
    {{$all->links()}}
</div>@endsection  
</body>
</html>