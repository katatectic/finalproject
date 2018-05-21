@extends('layouts.app')
@section('content')

<p class="btn btn-primary mb1 bg-green">Всего неопубликованных комментариев: {{$unpublishedCommentsCount}} </p>
<div>
    <table class="adminTable">
        <th>Автор</th>
        <th>Заголовок новости</th>
        <th>Заголовок события</th>
        <th>Комментарий</th>
        @foreach($all as $comment)
        @if ($comment->ispublished == 0)
        <tr class="showForm">
            
            <td class="title"><a href="{{route('profile',['id'=>$comment->user->id])}}">{{$comment->user->name}}</a></td>

            @if ($comment->article_id !== null)
            <td><a href="{{route('article', ['id'=>$comment->article->id])}}">{{$comment->article->title}}</a></td>
            @else
            <td class="date">---</td>
            @endif

            @if ($comment->event_id !== null)
            <td><a href="{{route('event.show', ['id'=>$comment->event->id])}}">{{$comment->event->title}}</a></td>
            @else
            <td class="date">---</td>
            @endif

            <td class="content"><div style="max-height:120px;width:100px;overflow-x:hidden">{{$comment->comment}}</div></td>

            <td><a href="{{route('comment.confirm', ['id'=>$comment->id])}}" class="more-link button">Одобрить комментарий</a></td>

            <td><a href="{{route('deletecomment',$comment->id)}}" onclick="return confirm('Удалить комментарий?')" class="more-link button">Удалить комментарий</a></td>            

        </tr>
        @endif
        @endforeach
    </table>
    {{$all->links()}}
</div>
<p class="btn btn-primary mb1 bg-green">Всего опубликованных комментариев: {{$publishedCommentsCount}} </p>
<div>
    <table class="adminTable">
        <th>Автор</th>
        <th>Заголовок новости</th>
        <th>Заголовок события</th>
        <th>Комментарий</th>
        @foreach($all as $comment)
        @if ($comment->ispublished == 1)
        <tr class="showForm">
            
            <td class="title"><a href="{{route('profile',['id'=>$comment->user->id])}}">{{$comment->user->name}}</a></td>

            @if ($comment->article_id !== null)
            <td><a href="{{route('article', ['id'=>$comment->article->id])}}">{{$comment->article->title}}</a></td>
            @else
            <td class="date">---</td>
            @endif

            @if ($comment->event_id !== null)
            <td><a href="{{route('event.show', ['id'=>$comment->event->id])}}">{{$comment->event->title}}</a></td>
            @else
            <td class="date">---</td>
            @endif

            <td class="content"><div style="max-height:120px;width:100px;overflow-x:hidden">{{$comment->comment}}</div></td>

            <td><a href="{{route('deletecomment',$comment->id)}}" onclick="return confirm('Удалить комментарий?')" class="more-link button">Удалить комментарий</a></td>

        </tr>
        @endif
        @endforeach
    </table>
    {{$all->links()}}
</div>

@endsection  
</body>
</html>